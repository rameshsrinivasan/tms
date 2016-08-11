<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function index()
    {
    	echo "<h1>Test Content.</h1>";
		echo date('Y-m-d h:i:s a');
    }
}
