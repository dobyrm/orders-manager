<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param array $data
     * @param string $message
     * @param string $status
     * @param int $code
     * @return JsonResponse
     */
    public function jsonResponse(array $data = [], string $message = 'OK', string $status = 'success', int $code = 200)
    {
        $collection = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($collection, $code);
    }
}
