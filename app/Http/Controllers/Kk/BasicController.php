<?php

namespace App\Http\Controllers\Kk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BasicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


}
