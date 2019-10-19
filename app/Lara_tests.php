<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lara_tests extends Model
{
	//protected $table = "links";
	protected $fillable = ['test_id', 'type', 'level', 'picture', 'selected'];
	public $timestamps = false;


	public static function all_tests($id)
	{
		return static::where('test_id', $id)->pluck('picture');
	}

	public static function currenttask($id)
	{
		return static::where('task_id', $id)->get();
	}
    
	public static function current_test_id()
	{
		return static::max('test_id');
	}

	




}
