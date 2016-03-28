<?php

namespace App\Http\Controllers\Visitor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\VistorTriesToSignIn;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function getSignIn()
    {
    	return;
    }

    public function postSignIn(VistorTriesToSignIn $request)
    {
    	// dd($request->all());
    }
}
