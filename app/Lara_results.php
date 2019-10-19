<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lara_results extends Model
{
	protected $fillable = ['token', 'type', 'result', 'created_at', 'user_id', 'test_id', 'level'];
	public $timestamps = false;
	
	public static function all_tasks($session_id)
	{
		return static::where('token', $session_id)->get();
	}
    //
}
