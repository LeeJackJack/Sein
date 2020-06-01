<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equip05 extends Model
{
    protected $table = 't_move_data';
    protected $primaryKey = 'data_id';
    protected $keyType = 'string';

    //禁用自带时间戳更新功能
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'device_code' ,
        'timestamp' ,
        'lon' ,
        'lat' ,
        'no' ,
        'no2' ,
        'co' ,
        'co2' ,
        'o3' ,
        'so2' ,
        'tvocs' ,
        'cho' ,
        'pm1' ,
        'pm25' ,
        'pm10' ,
        'temp' ,
        'humi' ,
        'press' ,
        'height' ,
        'create_time' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'data_id','create_time'
    ];
}
