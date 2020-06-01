<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquip05sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_move_data', function (Blueprint $table) {
            $table->increments('data_id');
            $table->string('device_code',32);
            $table->timestamp('timestamp');
            $table->integer('lon');
            $table->integer('lat');
            $table->integer('no');
            $table->integer('no2');
            $table->integer('co');
            $table->integer('co2');
            $table->integer('o3');
            $table->integer('so2');
            $table->integer('tvoc');
            $table->integer('cho');
            $table->integer('pm1');
            $table->integer('pm25');
            $table->integer('pm10');
            $table->integer('temp');
            $table->integer('humi');
            $table->integer('press');
            $table->timestamp('create_time');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_move_data');
    }
}
