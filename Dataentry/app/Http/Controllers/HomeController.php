<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('newMiddlewareExample.form');
    }

    public function formPost(Request $request)
    {
        $data[1] = $request->field1;
        $data[2] = $request->field2;

        return view('newMiddlewareExample.data')->with('data', $data);
    }




}
