<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
		$crud = DB::table('cruds')->get();
        return view('home',['crud' => $crud]);
    }
}
