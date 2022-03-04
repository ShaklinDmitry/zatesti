<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelegramBotController extends Controller
{
    //
    public function setInfo(Request $request){
        return 'you here its all right';
    //    return response() -> json($request, 201);
    }
}
