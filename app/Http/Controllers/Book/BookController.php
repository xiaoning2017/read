<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BookModel;
use App\Model\CateModel;
class BookController extends Controller
{
    //作者申请添加页面
    public function create(Request $request)
    {
        return view('book/create');
    }
    //登陆后主页面
    public function index(Request $request)
    {
        $cateData = CateModel::get();
        $where=[];
        $cate_name=$request->cate_name;
        // dd($book_name);
        if ($cate_name) {
            $where[]=['cate_name','like','%'.$cate_name.'%'];
        }
        // $bookData = BookModel::get();
        $bookData=BookModel::where($where)->join('cate','cate.cate_id','=','book.cate_id')->get();
        // $bookData=BookModel::leftjoin('cate','book.book_id','=','cate.cate_id')
        // ->select('book.*', 'cate.cate_name');
        // ->where($where);
        // dd($bookData);
        return view('book.index',['bookData'=>$bookData],['cateData'=>$cateData]);
    }
    //搜索分类页面
    public function search(Request $request){
        $data = $request->input();
        dd($data);

    }

}
