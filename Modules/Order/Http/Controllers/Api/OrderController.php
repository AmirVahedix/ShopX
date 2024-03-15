<?php

namespace Modules\Order\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Order\Actions\OrderIndexAction;

class OrderController extends Controller
{
    public function index(OrderIndexAction $action)
    {
        return $this->executeApiAction($action);
    }
}
