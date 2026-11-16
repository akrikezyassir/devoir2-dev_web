<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myController extends Controller
{
    public function index()
    {
        $name = "Sir";

        return view('myview', compact('name'));
    }
}