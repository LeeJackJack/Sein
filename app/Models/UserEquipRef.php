<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEquipRef extends Model
{
    protected $table = 't_user_api';
    protected $primaryKey = 'infoid';
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
        'userid' ,
        'password' ,
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
