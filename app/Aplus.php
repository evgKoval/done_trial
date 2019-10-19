<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplus extends Model
{
	protected $table = 'aplus';
    
   	public static function alltasks($id1, $id2)
	{
		return static::where('test_id', '<', $id2)->where('test_id', '>', $id1)->get();
	}

	public static function currenttask($id)
	{
		return static::where('test_id', $id)->get();
	}
}
