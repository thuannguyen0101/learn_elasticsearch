<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Elastic\ScoutDriverPlus\Support\Query;

class BookController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword', '');
        $pit = Book::openPointInTime('1m');

        if (!empty($keyword)) {
            // multiMatch cho phép khớp với nhiều field
            // dd($keyword);

            $query = Query::bool()
                ->should(Query::matchPhrase()->field('author')->query($keyword))
                ->should(Query::match()->field('name')->query($keyword));
                // chỉ định các trường cho phép tìm kiếm
                // ->fields(['name', 'author'])
                // giá trị mà bạn muốn tìm kiếm
                // ->query($keyword);
                // chỉ định độ mờ tối đa của truy vẫn (cho phép sai chỉnh tả)
                // ->fuzziness('AUTO');
        } else {
            // tạo truy vấn khới với tất cả tài liệu
            $query = Query::matchAll();
        }
        // bắt đầu tìm kiếm với query được build với model bằng searchQuery()
        $searchResult = Book::searchQuery($query)
            ->aggregate('max_price', [
                'avg' => [
                    'field' => 'price'
                ]
            ])
            // ->aggregateRaw([
            //     'price_buckets' => [
            //         'terms' => [
            //             'field' => 'price',
            //             'size' => 10,
            //         ],
            //     ],
            // ])
            // chỉ định số bản ghi trả về
            ->size(20)
            // hiện thị cách tính điểm của cấu lệnh search
            // ->explain(true)
            // // chỉ định highlight trường tìm kiếm 
            // ->highlight('name')
            // // chỉ định số điểm tối thiểm của doc để lọc 
            // ->minScore(0.5)
            // // đươc sư dụng để tránh các sai lệch giữa 2 query khi dữ liệu bị update
            // ->pointInTime($pit, '5m')
            // truy xuất kết quả search với câu lệnh thực thi execute()
            ->execute();

            // $aggregations = $searchResult->aggregations();
            // $priceBucketsAgg = $aggregations->get('price_buckets');
            // $buckets = $priceBucketsAgg['buckets'] ?? [];
            // // dd($buckets);
            // foreach ($buckets as $bucket) {
            //     echo "Giá trị: " . $bucket['key'] . ", Số lượng: " . $bucket['doc_count'] . "\n";
            // }
            // dd(1);
        $aggregations = $searchResult->aggregations();
        $maxPrice = $aggregations->get('max_price');
        // dd($maxPrice['value']);
        $hits       = $searchResult->hits();
        $documents  = $searchResult->documents();
        $highlights = $searchResult->highlights();
        // dd($searchResult);

        $books = $searchResult->models();

        return view('books', compact('books', 'maxPrice'));
    }

    /**
     * @param Request $request
     */
    public function query(Request $request){
        
    }
}
