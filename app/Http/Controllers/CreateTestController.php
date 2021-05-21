<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class CreateTestController extends Controller
{

    public function createTest(Request $request){

        $test = new Test();
        $result = $test->create($request->name);

        return $result;

    }
}
