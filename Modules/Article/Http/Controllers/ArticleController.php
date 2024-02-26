<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        return view('Article::index');
    }

    public function create()
    {
        return view('Article::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Article::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
