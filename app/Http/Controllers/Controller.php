<?php

namespace App\Http\Controllers;

use App\Contracts\ApiAction;
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
             'status' => 'error',
             'message' => __($exception->getMessage()),
        ], $this->getExceptionCode($exception));
    }

    public function executeApiAction(ApiAction $action)
    {
        try {
            $result = $action->execute();
            return is_array($result)
                ? response()->json([
                    'status' => 'ok',
                    ...$action->execute(),
                ])
                : $result;
        } catch (Exception $e) {
            return $this->exception($e);
        }
    }

    /**
     * @param Exception $exception
     * @return int
     */
    public function getExceptionCode(Exception $exception): int
    {
        return $exception->getCode() === 0
            ? 500
            : $exception->getCode();
    }
}
