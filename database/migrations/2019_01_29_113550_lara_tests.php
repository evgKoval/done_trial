<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LaraTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('lara_tests', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('test_id');
    $table->string('type');
    $table->integer('level');
    $table->string('picture')->nullable();
    $table->boolean('selected')->nullable();
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
        Schema::drop('lara_tests');
    }
}
