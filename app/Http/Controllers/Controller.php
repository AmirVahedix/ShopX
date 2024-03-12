<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function exception(Exception $exception)
    {
        return response()->json([
             'message' => __($exception->getMessage()),
        ], $exception->getCode());
    }

    public function executeApiAction($action)
    {
        try {
            return $action->execute();
        } catch (Exception $e) {
            return $this->exception($e);
        }
    }
}
