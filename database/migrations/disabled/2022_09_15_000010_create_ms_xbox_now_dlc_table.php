<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsXboxNowDlcTable extends Migration
{
    public function up()
    {
        Schema::create('xbox_now_dlc', function (Blueprint $table) {
            $table->bigIncrements('index');
            $table->string('game_id')->nullable();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->boolean('is_game')->default(0)->nullable();
            $table->boolean('on_sale');
            $table->bigInteger('discount_percent');
            $table->date('end_sale')->nullable()->default(null);
            $table->string('region_1');
            $table->string('price_region_1');
            $table->string('region_2');
            $table->string('price_region_2');
            $table->string('region_3');
            $table->string('price_region_3');
        });
    }
}
