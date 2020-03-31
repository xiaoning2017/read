<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view();
    }
    public function create(){
        return view('book/create');
    }
}
