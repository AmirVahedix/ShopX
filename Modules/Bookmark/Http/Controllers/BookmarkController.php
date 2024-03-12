<?php

namespace Modules\Bookmark\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookmarkController extends Controller
{
    public function index()
    {
        return view('Bookmark::index');
    }

    public function create()
    {
        return view('Bookmark::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Bookmark::edit');
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
