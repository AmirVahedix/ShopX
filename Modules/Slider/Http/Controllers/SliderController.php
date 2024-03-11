<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SliderController extends Controller
{
    public function index()
    {
        return view('Slider::index');
    }

    public function create()
    {
        return view('Slider::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Slider::edit');
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
