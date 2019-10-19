<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LaraAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('lara_answers', function (Blueprint $table) {
    $table->increments('id');
    $table->string('token');
    $table->integer('user_id');
    $table->integer('test_id');
    $table->string('type');
    $table->string('answer')->nullable();
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
