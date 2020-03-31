<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BookModel;
class BookController extends Controller
{
    public function create(Request $request)
    {
        return view('book/create');
    }
    public function index(Request $request)
    {
        $where=[];
        $book_name=$request->book_name;
        if ($book_name) {
            $where[]=['book_name','like','%'.$book_name.'%'];
        }
        $bookData=BookModel::leftjoin('cate','book.book_id','=','cate.cate_id')
        ->select('book.*', 'cate.cate_name')
        ->where($where);
        return view('book.index',['bookData'=>$bookData]);
    }

}
