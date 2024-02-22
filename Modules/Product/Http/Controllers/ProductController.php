<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('Product::index');
    }

    public function create()
    {
        return view('Product::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Product::edit');
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
