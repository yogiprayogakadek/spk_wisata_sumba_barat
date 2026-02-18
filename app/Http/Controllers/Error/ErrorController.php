<?php

namespace App\Http\Controllers\Error;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function forbidden()
    {
        return view('error.403');
    }
}
