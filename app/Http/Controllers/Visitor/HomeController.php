<?php

namespace App\Http\Controllers\Visitor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $viewPrefix = 'mpos.public.';

    public function getIndex()
    {
    	return view($this->viewPrefix . 'index')->with([]);
    }
}
