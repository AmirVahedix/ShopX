<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth::index');
    }

    public function create()
    {
        return view('Auth::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Auth::edit');
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
