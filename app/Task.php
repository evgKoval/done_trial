<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	//protected $table = "links";
	public static function incomplete()
	{
		return static::where('klass', 10)->get();
	}

	public static function currenttask($id)
	{
		return static::where('task_id', $id)->get();
	}
    //
}
