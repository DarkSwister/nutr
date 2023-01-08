<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestApiController extends Controller
{

    public function test()
    {
        $response = ['message' => 'Response test message!'];
        return response($response, 200);
    }
}
