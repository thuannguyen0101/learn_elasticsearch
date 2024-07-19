<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Elastic\ScoutDriverPlus\Support\Query;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword', '');
        if (!empty($keyword)) {
            // multiMatch cho phép khớp với nhiều field
            $query = Query::multiMatch()
                // chỉ định các trường cho phép tìm kiếm
                ->fields(['name', 'author'])
                // giá trị mà bạn muốn tìm kiếm
                ->query($keyword)
                // chỉ định độ mờ tối đa của truy vẫn (cho phép sai chỉnh tả)
                ->fuzziness('AUTO');
        } else {
            // tạo truy vấn khới với tất cả tài liệu
            $query = Query::matchAll();
        }
        // bắt đầu tìm kiếm với query được build với model bằng searchQuery()
        $searchResult = Book::searchQuery($query)
            // chỉ định số bản ghi trả về
            ->size(20)
            // truy xuất kết quả search với câu lệnh thực thi execute()
            ->execute();

        $hits       = $searchResult->hits();
        $documents  = $searchResult->documents();
        $highlights = $searchResult->highlights();
//        dd($hits, $documents, $highlights);

        $books = $searchResult->models();

        return view('books', compact('books'));
    }
}
