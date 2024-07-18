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

//        if (!empty($keyword)) {
//            $query = Query::match()
//                ->field('name')
//                ->query($keyword)
//                ->fuzziness('AUTO');
//        }
//        else{
//            $query = Query::matchAll();
//        }
        $searchResult = Book::searchQuery()
            ->aggregate('max_price', [
                'max' => [
                    'field' => 'price',
                ],
            ])
            ->execute();
        $aggregations = $searchResult->aggregations();
        $maxPrice = $aggregations->get('max_price');
//        $builder = Book::searchQuery($query)
//            ->sort('price', 'asc')->execute();

//        $books = $searchResult->models();

        dd($maxPrice);
        return view('books', compact('books'));
    }
}
