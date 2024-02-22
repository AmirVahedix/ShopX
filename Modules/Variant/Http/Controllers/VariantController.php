<?php

namespace Modules\Variant\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class VariantController extends Controller
{
    public function index()
    {
        return view('Variant::index');
    }

    public function create()
    {
        return view('Variant::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Variant::edit');
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
