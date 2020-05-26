<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_station_data_1min', function (Blueprint $table) {
            $table->increments('data_id');
            $table->string('station_code',32);
            $table->timestamp('timestamp');
            $table->integer('lon');
            $table->integer('lat');
            $table->integer('no');
            $table->integer('no2');
            $table->integer('co');
            $table->integer('co2');
            $table->integer('o3');
            $table->integer('so2');
            $table->integer('voc');
            $table->integer('cho');
            $table->integer('pm1');
            $table->integer('pm25');
            $table->integer('pm10');
            $table->integer('temp');
            $table->integer('humi');
            $table->integer('press');
            $table->integer('prec');
            $table->integer('speed');
            $table->integer('direction');
            $table->integer('aqhi');
            $table->timestamp('create_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_station_data_1min');
    }
}
