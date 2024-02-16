<?php

namespace Modules\Address\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AddressController extends Controller
{
    public function index()
    {
        return view('Address::index');
    }

    public function create()
    {
        return view('Address::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Address::edit');
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
