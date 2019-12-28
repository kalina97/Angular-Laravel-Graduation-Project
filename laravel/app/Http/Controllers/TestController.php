<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $item = 1;

        return response()->json($item, 200);
    }
}
