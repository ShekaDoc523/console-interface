<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsXboxesTable extends Migration
{
    public function up()
    {
        Schema::create('ms_xbox', function (Blueprint $table) {
            $table->bigIncrements('index');
            $table->string('game_id');
            $table->string('product_name')->nullable();
            $table->bigInteger('ranking')->nullable();
            $table->double('price', 15, 2)->nullable();
            $table->boolean('on_sale')->default(0)->nullable();
            $table->double('price_on_sale', 15, 2)->nullable();
            $table->string('release_date')->nullable();
            $table->boolean('pre_order')->default(0)->nullable();
            $table->string('platform');
            $table->string('source');
            $table->timestamps();
        });
    }
}
