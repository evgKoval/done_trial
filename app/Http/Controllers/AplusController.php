<?php

namespace App\Http\Controllers;

use Session;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Request;

                
class AplusController extends Controller
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
        $tasks = \App\aplus::alltasks(111, 120);
        //var_dump($tasks);
        return view('aplus', ['tasks' => $tasks]);

    }

    public function task($id)
    {
        $task = \App\aplus::currenttask($id);
        //var_dump($task);
        return view('aplus_task', ['tasks' => $task]);
    }

     public function save_result(Request $request)
    {

        $token = $request->input('_token');
        if(!empty($request->input('test')))
        \App\Lara_answers::create(['token' => $token, 'type' => 'aplus', 'answer' => $request->input('test'), 'user_id' => Auth::user()->id, 'test_id' => $request->input('id')]);

    $currenttask = \App\aplus::currenttask($request->input('id'));
  
          if ($request->input('test')==$currenttask[0]->right_answer) $result=1; else $result=0;
    
    \App\Lara_results::create(['token' => $token, 'type' => 'aplus', 'result' => $result, 
        'user_id' => Auth::user()->id, 'test_id' => $request->input('id'), 'level' => $currenttask[0]->klass]);        

    return redirect()->action('AplusController@index');

  
    }

}