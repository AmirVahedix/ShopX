<?php

namespace Modules\Order\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Order\Actions\OrderIndexAction;
use Modules\Order\Actions\OrderShowAction;

class OrderController extends Controller
{
    public function index(OrderIndexAction $action)
    {
        return $this->executeApiAction($action);
    }

    public function show($sku, OrderShowAction $action)
    {
        return $this->executeApiAction($action);
    }
}
