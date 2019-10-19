<?php

namespace App\Http\Controllers;

use Session;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Request;

                
class MathController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $min =10;
    public $max = 30;

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
        $tasks = \App\task::incomplete();
        //var_dump($tasks);
        return view('tasks', ['tasks' => $tasks]);

    }

  

    public function task()
    {
        $task = \App\task::currenttask(342);
        //var_dump($task);
        return view('tasks', ['tasks' => $task]);
    }
}