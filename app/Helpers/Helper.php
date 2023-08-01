<?php

if (!function_exists('api_response')) {
    /**
     * @param $msg
     * @param $data
     * @param $status
     * @return \Illuminate\Http\JsonResponse
     */
    function api_response($msg, $data, $status): \Illuminate\Http\JsonResponse
    {
        return response()->json(data: [
            'message' => $msg,
            'data' => $data,
        ], status: $status);
    }

    // Add more custom helper functions here as needed...
}
