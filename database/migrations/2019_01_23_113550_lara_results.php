<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LaraResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lara_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->change();
            $table->integer('test_id')->change();
            $table->string('token');
            $table->string('type');
            $table->string('level');
            $table->string('result');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lara_results');
    }
}
