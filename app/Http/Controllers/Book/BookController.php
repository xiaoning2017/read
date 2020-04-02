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
        $pagesize = config('app.pageSize');
        // $bookData = BookModel::get();
        $bookData=BookModel::where($where)->join('cate','cate.cate_id','=','book.cate_id')->paginate($pagesize);
        // $bookData=BookModel::leftjoin('cate','book.book_id','=','cate.cate_id')
        // ->select('book.*', 'cate.cate_name');
        // ->where($where);
        // dd($bookData);
        return view('book.index',['bookData'=>$bookData],['cateData'=>$cateData]);
    }
    //搜索分类页面
    public function search(Request $request){
        $data = $request->all();
        dd($data);

    }
    public function writer()
    {
        $cateData = CateModel::get();
        return view('book/writer',['cateData'=>$cateData]);
    }
    public function add_do(Request $request)
    {
        $data = $request->all();
        $res = BookModel::create($data);
        if($res){
            echo "<script>alert('添加成功');location.href='/book/index'</script>";die;
        }else{
            echo "<script>alert('添加失败');location.href='/book/index'</script>";die;
        }
    }

}
