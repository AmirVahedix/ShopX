<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin::index');
    }

    public function create()
    {
        return view('Admin::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Admin::edit');
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
