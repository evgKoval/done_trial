<?php

namespace App\Http\Controllers;

use Session;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Request;

                
class SavemyexamsController extends Controller
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
    public  $all_pictures;

    public function index()
    {
        return view('example');
    }

    public function task($subj)
    {
       // $subj = \App\aplus::currenttask($subj);
        //var_dump($subj); die();
        return view($subj."example");
    }

   

}