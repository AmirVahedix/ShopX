<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('Category::index');
    }

    public function create()
    {
        return view('Category::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Category::edit');
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
