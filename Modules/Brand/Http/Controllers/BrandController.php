<?php

namespace Modules\Brand\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BrandController extends Controller
{
    public function index()
    {
        return view('Brand::index');
    }

    public function create()
    {
        return view('Brand::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Brand::edit');
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
