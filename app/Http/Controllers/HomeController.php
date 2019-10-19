<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

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
        return view('home');
    }

    public function link()
    {
        $links = \App\Link::all();
        return view('welcome', ['links' => $links]);
    }

    public function tasks($id)
    {
        $tasks = \App\Task::currenttask($id);
        return view('tasks', ['tasks' => $tasks]);
    }

    public function paints()
    {
        $tasks = \App\eidatic_painting::all();
        return view('andrey', ['tasks' => $tasks]);
    }
}
