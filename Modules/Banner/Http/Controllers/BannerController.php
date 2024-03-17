<?php

namespace Modules\Banner\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BannerController extends Controller
{
    public function index()
    {
        return view('Banner::index');
    }

    public function create()
    {
        return view('Banner::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Banner::edit');
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
