<?php

namespace Modules\Attribute\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AttributeController extends Controller
{
    public function index()
    {
        return view('Attribute::index');
    }

    public function create()
    {
        return view('Attribute::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Attribute::edit');
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
