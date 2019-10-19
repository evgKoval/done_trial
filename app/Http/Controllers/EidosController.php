<?php

namespace App\Http\Controllers;

use Session;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Request;


class EidosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $min = 10;
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
        return view('home');
    }

    public function show_icons($level)
    {
        $dirname = 'images/eidos/icons/level-' . $level;
        $all_names = array_slice(scandir($dirname), 2);
        shuffle($all_names);
        $pictures = array_slice($all_names, 0, $this->max);
        $selected = array_rand($pictures, $this->min);
        $id = \App\Lara_tests::current_test_id();
        $id++;
        for ($i = 0; $i < $this->max; $i++)
            \App\Lara_tests::create(
                [
                    'test_id' => $id,
                    'type' => 'icons',
                    'level' => $level,
                    'picture' => $pictures[$i],
                    'selected' => in_array($i, $selected)
                ]
            );
        $selected = \App\Lara_tests::where('test_id', $id)->where('selected', 1)->pluck('picture');

        return view('show_icons', ['numbers' => $selected, 'level' => $level]);
    }

    public function find_icons($level)
    {
        $id = \App\Lara_tests::current_test_id();
        $pictures = \App\Lara_tests::all_tests($id);
        return view('icons2', ['pictures' => $pictures, 'num' => $this->min, 'level' => $level]);
    }

    public function save_result(Request $request)
    {
        $id = \App\Lara_tests::current_test_id();
        // $id = \App\Lara_answers::max_icon_id();
        $token = $request->input('_token');
        foreach ($request->input('icons.*') as $icons)
            if (!empty($icons))
                \App\Lara_answers::create(['token' => $token, 'type' => 'icons', 'answer' => $icons, 'user_id' => Auth::user()->id, 'test_id' => $id]);
        $result = 0;

        foreach ($request->input('icons.*') as $icons)
            if (!empty($icons)) {
                $r = DB::table('lara_tests')->where('test_id', $id)->where('picture', $icons)->pluck('selected');
                $result += $r[0];
            }

        $all_icons = \App\Lara_tests::all_tests($id);
        //$all_icons = DB::table('lara_tests')->where('test_id', $id)->pluck('picture');
        $level = DB::table('lara_tests')->where('test_id', $id)->pluck('level')->first();

        \App\Lara_results::create([
            'token' => $token, 'type' => 'icons', 'result' => $result,
            'user_id' => Auth::user()->id, 'test_id' => $id, 'level' => $level
        ]);

        $right_icons = DB::table('lara_tests')->where('test_id', $id)->where('selected', true)->pluck('picture');

        return view('results_icons', [
            'your_answers' => $request->input('icons.*'),
            'right_answers' => $right_icons, 'all_answers' => $all_icons, 'level' => $level, 'result' => $result
        ]);
    }

    public function paints()
    {
        // $tasks = \App\eidatic_painting::all();
        $tasks = \App\lara_painting::all();
        $tasks = DB::table('lara_painting')->select('name', 'author', 'year', 'link_small', 'link_large')->where('author', 'Илья Ефимович Репин')->get();
        //var_dump($tasks);
        return view('painting', ['tasks' => $tasks]);
    }
}
