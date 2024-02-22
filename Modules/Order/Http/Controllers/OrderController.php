<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return view('Order::index');
    }

    public function create()
    {
        return view('Order::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('Order::edit');
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
