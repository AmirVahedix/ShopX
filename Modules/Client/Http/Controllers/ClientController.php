<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClientController extends Controller
{
    public function index()
    {
        return view('Client::index');
    }

    public function create()
    {
        return view('Client::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Client::edit');
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
