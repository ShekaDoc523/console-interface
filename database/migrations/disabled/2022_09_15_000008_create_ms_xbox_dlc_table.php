<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsXboxDlcTable extends Migration
{
    public function up()
    {
        Schema::create('ms_xbox_dlc', function (Blueprint $table) {
            $table->bigIncrements('index');
            $table->string('game_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('addon_name')->nullable();
            $table->double('price', 15, 2)->nullable();
            $table->text('source')->nullable();
            $table->string('platform')->nullable();
            $table->timestamps();
        });
    }
}
