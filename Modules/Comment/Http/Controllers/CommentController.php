<?php

namespace Modules\Comment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
    public function index()
    {
        return view('Comment::index');
    }

    public function create()
    {
        return view('Comment::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Comment::edit');
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
