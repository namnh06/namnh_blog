<?php

function response_success($data = [], $message = "", $code = 200)
{
    return response(['status' => 'success', 'message' => $message, 'data' => $data], $code);
}

function response_error($data = [], $message = '', $code = 200)
{
    return response(['status' => 'error', 'message' => $message, 'data' => $data], $code);
}