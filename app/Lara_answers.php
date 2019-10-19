<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lara_answers extends Model
{
	protected $fillable = ['token', 'type', 'answer', 'time', 'user_id', 'test_id'];
	public $timestamps = false;
	
	public static function all_tasks($session_id)
	{
		return static::where('token', $session_id)->get();
	}
    public static function max_icon_id()
	{
		return \DB::table('lara_answers')->where('type', 'icons')->max('test_id');
	}
}
