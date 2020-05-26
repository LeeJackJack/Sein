<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equips extends Model
{
    protected $table = 't_station_data_1min';
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
        'station_code' ,
        'timestamp' ,
        'lon' ,
        'lat' ,
        'no' ,
        'no2' ,
        'co' ,
        'co2' ,
        'o3' ,
        'so2' ,
        'voc' ,
        'cho' ,
        'pm1' ,
        'pm25' ,
        'pm10' ,
        'temp' ,
        'humi' ,
        'press' ,
        'prec' ,
        'speed' ,
        'direction' ,
        'aqhi' ,
        'create_time' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public static function boot()
    {
        parent::boot();

        static::creating( function( $model )
        {
            //
        } );
    }
}
