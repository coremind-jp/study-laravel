<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class EloquentController extends Controller
{
    //
    public function index()
    {
        return view('eloquent.index', [
            'all' => Book::all(),
            'find' => Book::find(1)->title,
            'max' => Book::where('publisher', '翔泳社')->max('price'),
            'select' => Book::select('title', 'publisher')->get(),

            'groupby_a' => Book::groupBy('publisher')
                ->selectRaw('publisher, AVG(price) AS price_avg')
                ->get(),

            'groupby_b' => Book::groupBy('publisher')
                ->having('price_avg', '<', 2500)
                ->selectRaw('publisher, AVG(price) AS price_avg')
                ->get(),
            
            'where' => [
                [
                    'query'   => "Book::where('publisher', '翔泳社')->get()",
                    'records' =>  Book::where('publisher', '翔泳社')->get(),    
                ],
                [
                    'query'   => "Book::where('publisher', '翔泳社')->first()",
                    'records' => [Book::where('publisher', '翔泳社')->first()],
                ],
                [
                    'query'   => "Book::where('price', '<', 3000)->get()",
                    'records' =>  Book::where('price', '<', 3000)->get(),
                ],
                [
                    'query'   => "Book::where('title', 'LIKE', '%Java%')->get()",
                    'records' =>  Book::where('title', 'LIKE', '%Java%')->get(),
                ],
                [
                    'query'   => "Book::where('publisher', ['日経BP', '翔泳社', 'インプレス'])->get()",
                    'records' =>  Book::where('publisher', ['日経BP', '翔泳社', 'インプレス'])->get(),
                ],
                [
                    'query'   => "Book::whereBetween('price', [2000, 3000])->get()",
                    'records' =>  Book::whereBetween('price', [2000, 3000])->get(),
                ],
                [
                    'query'   => "Book::whereNull('publisher')->get()",
                    'records' =>  Book::whereNull('publisher')->get(),
                ],
                [
                    'query'   => "Book::whereYear('published', '2019')->get()",
                    'records' =>  Book::whereYear('published', '2019')->get(),
                ],
                [
                    'query'   => "Book::whereYear('published', '<', '2019')->get()",
                    'records' =>  Book::whereYear('published', '<', '2019')->get(),
                ],
                [
                    'query'   => "Book::where('publisher', '翔泳社')->where('price', '<', 3000)->get()",
                    'records' =>  Book::where('publisher', '翔泳社')->where('price', '<', 3000)->get(),
                ],
                [
                    'query'   => "Book::where('publisher', '翔泳社')->orWhere('price', '<', 2500)->get()",
                    'records' =>  Book::where('publisher', '翔泳社')->orWhere('price', '<', 2500)->get(),
                ],
                [
                    'query'   => "Book::whereRaw('publisher = ? AND price < ?', ['翔泳社', 3000])->get()",
                    'records' =>  Book::whereRaw('publisher = ? AND price < ?', ['翔泳社', 3000])->get(),
                ],
            ],
            'orderby' => [
                [
                    'query'   => "Book::orderBy('publisher', 'asc')->orderBy('price', 'desc')->get()",
                    'records' =>  Book::orderBy('publisher', 'asc')->orderBy('price', 'desc')->get(),
                ],
                [
                    'query'   => "Book::orderBy('publisher', 'desc')->offset(2)->limit(3)->get()",
                    'records' =>  Book::orderBy('publisher', 'desc')->offset(2)->limit(3)->get(),
                ],
            ],
        ]);
    }
}
