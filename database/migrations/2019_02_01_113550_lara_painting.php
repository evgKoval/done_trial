<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LaraPainting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('lara_painting', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->string('author');
    $table->string('museum');
    $table->string('year');
    $table->string('link_small');
    $table->string('link_large');
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
        Schema::drop('lara_painting');
    }
}
