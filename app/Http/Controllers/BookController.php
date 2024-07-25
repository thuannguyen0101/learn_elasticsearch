<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Elastic\ScoutDriverPlus\Support\Query;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword', '');
        $page = $request->get('page', 1);

        if (!empty($keyword)) {
            // $queryBuilder = $this->buildQuery($keyword);
            // $searchResult = Book::searchQuery($queryBuilder)->execute()->models();
            // dd($searchResult);

            $query = Query::bool()
                ->should(Query::exists()->field('deleted_at'))
                ->should(Query::term()->field('author.keyword')->value($keyword))
                ->should(Query::match()->field('name')->query($keyword)->fuzziness('AUTO'))
                ->should(Query::match()->field('nation')->query($keyword)->fuzziness('AUTO'))
                ->minimumShouldMatch(1);
        } else {
            // tạo truy vấn khới với tất cả tài liệu
            $query = Query::bool()->mustNot(Query::exists()->field('deleted_at'));
        }
        // bắt đầu tìm kiếm với query được build với model bằng searchQuery()
        $searchResult = Book::searchQuery($query)
            ->aggregate('max_price', [
                'avg' => [
                    'field' => 'price'
                ]
            ])
            ->sort('created_at', 'desc')
            ->paginate(50, 'page', $page);

            // ->aggregateRaw([
            //     'price_buckets' => [
            //         'terms' => [
            //             'field' => 'price',
            //             'size' => 10,
            //         ],
            //     ],
            // ])
            // chỉ định số bản ghi trả về 
            // hiện thị cách tính điểm của cấu lệnh search
            // ->explain(true)
            // // chỉ định highlight trường tìm kiếm 
            // ->highlight('name')
            // // chỉ định số điểm tối thiểm của doc để lọc 
            // ->minScore(0.5)
            // // đươc sư dụng để tránh các sai lệch giữa 2 query khi dữ liệu bị update
            // ->pointInTime($pit, '5m')
            // truy xuất kết quả search với câu lệnh thực thi execute()
            // $aggregations = $searchResult->aggregations();
            // $priceBucketsAgg = $aggregations->get('price_buckets');
            // $buckets = $priceBucketsAgg['buckets'] ?? [];
            // // dd($buckets);
            // foreach ($buckets as $bucket) {
            //     echo "Giá trị: " . $bucket['key'] . ", Số lượng: " . $bucket['doc_count'] . "\n";
            // }
            // dd(1);

        $aggregations   = $searchResult->aggregations();
        $maxPrice       = $aggregations->get('max_price');
        
        $hits       = $searchResult->hits();
        $documents  = $searchResult->documents();
        $highlights = $searchResult->highlights();

        Log::info('this run app');
        $books = $searchResult->models();
        $paginate = $searchResult->links();

        return view('books.index', compact('books', 'maxPrice', 'paginate'));
    }

    /**
     * @param Request $request
     */
    public function buildQuery($search){
        //
        $query = Query::bool()->must(
            Query::match()
                ->field('name')
                ->query($search)
        );

        //  
        $filter = Query::term()
            ->field('name')
            ->value($search);
        
        $query = Query::bool()->filter($filter);
        
        //
        $must = Query::match()
            ->field('author')
            ->query($search);

        $query = Query::bool()->must($must);
        
        //
        $mustNot = Query::match()
            ->field('author')
            ->query($search);

        $query = Query::bool()->mustNot($mustNot);


        $query = Query::matchAll();

        $searchResult = Book::searchQuery($query)->execute();

        return $query;
    }

    /**
     * @param Request $request
     */
    public function create(Request $request){

        return view('books.form');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required',
            'nation' => 'required',
            'author' => 'required',
            'price' => 'required',
        ]);

        $book = new Book();
        $book->fill($validate);
        $book->save();

        return redirect()->route('books.index');
    }

    public function delete($id){
        $book = Book::find($id);
        if ($book){
            $book->delete();
        }
        sleep(5);
        return redirect()->route('books.index');
    }
}
