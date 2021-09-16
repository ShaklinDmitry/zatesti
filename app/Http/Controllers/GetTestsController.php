<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class GetTestsController extends Controller
{
    //
    public function getTestQuestions(Request $request){
        $test = new Test();

        $test->getTestQuestions($request);
    }
}
