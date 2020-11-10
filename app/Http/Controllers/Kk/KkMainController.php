<?php


namespace App\Http\Controllers\Kk;


use App\Http\Controllers\Controller;

abstract class KkMainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
}
