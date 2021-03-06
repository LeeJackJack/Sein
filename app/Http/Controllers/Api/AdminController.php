<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Speedy;
    use Carbon\Carbon;

    class AdminController extends Controller
    {
        protected $parameter_map = [
            '671088644' => 'so2' ,
            '671088645' => 'co2' ,
            '671088646' => 'co' ,
            '671088647' => 'no' ,
            '671088648' => 'no2' ,
            '671088649' => 'pm25' ,
            '671088650' => 'pm10' ,
            '671088651' => 'temp' ,
            '671088652' => 'humi' ,
            '671088653' => 'press' ,
            '671088654' => 'speed' ,
            '671088655' => 'direction' ,
        ];

        protected $parameter_map05 = [
            '671088644' => 'so2' ,
            '671088645' => 'co2' ,
            '671088646' => 'co' ,
            '671088647' => 'no' ,
            '671088648' => 'no2' ,
            '671088649' => 'pm25' ,
            '671088650' => 'pm10' ,
            '671088651' => 'temp' ,
            '671088652' => 'humi' ,
            '671088653' => 'press' ,
            '671088654' => 'speed' ,
        ];

        protected $parameter_map_reverse = [
            'so2'=>'671088644' ,
            'co2' => '671088645' ,
            'co' => '671088646' ,
            'no' => '671088647' ,
            'no2' => '671088648' ,
            'pm25' => '671088649',
            'pm10' => '671088650',
            'temp' => '671088651',
            'humi' => '671088652',
            'press' => '671088653',
            'speed' => '671088654',
            'direction' => '671088655',
        ];

        protected $parameter_map_reverse05 = [
            'so2'=>'671088644' ,
            'co2' => '671088645' ,
            'co' => '671088646' ,
            'no' => '671088647' ,
            'no2' => '671088648' ,
            'pm25' => '671088649',
            'pm10' => '671088650',
            'temp' => '671088651',
            'humi' => '671088652',
            'press' => '671088653',
            'speed' => '671088654',
        ];

        protected $quip_map = [
            '1' => '9203M200500116' ,
            '2' => '9203M200500117' ,
            '3' => '9203M200500118' ,
            '4' => '9203M200500119' ,
            '5' => '9707A200500020' ,
        ];

        public function getData( Request $request )
        {
            //接收参数
            $id = $request->get( 'station_id' );
            //$account = $request->get( 'account' );
            $secret = $request->get( 'key' );
            $monitor_ids = explode( ',' , $request->get( 'monitor_ids' ) );
            $now = now()->timestamp . str_limit(now()->micro,3,'');

            if ($id == '5')
            {
                //查对应参数表
                //设备
                if (array_key_exists($id,$this->quip_map))
                {
                    $name = 'Dev' . $this->quip_map[ $id ];
                }else
                {
                    $name = 'Dev';
                }
                //参数
                $parameter = [];
                foreach ( $monitor_ids as $m )
                {
                    if (array_key_exists($m,$this->parameter_map05))
                    {
                        $p = $this->parameter_map05[ $m ];
                        array_push( $parameter , $p.'' );
                    }else
                    {
                        //传递错误的数据编号
                        return response()->json([
                            'code' => '200' ,
                            'msg' => 'error' ,
                        ]);
                    }
                }

                //查询是否有获取参数权限
                $refs = Speedy::getModelInstance( 'user_equip_ref' )
                    ->where( 'station_code' , $name )
                    //->where( 'userid' , $account )
                    ->where( 'password' , $secret )
                    ->first();

                if ($refs)
                {
                    //查询参数
                    $data = [];
                    $timestamp = Carbon::parse( $refs->timestamp )->timestamp . str_limit(Carbon::parse( $refs->timestamp )->micro,3,'');
                    $temp = [];
                    $result = Speedy::getModelInstance( 'equip05' )->where( 'device_code' , $name )->orderBy( 'create_time' , 'DESC' )->first($parameter)->toArray();
                    foreach ($result as $key => $value)
                    {
                        $arr = [];
                        array_set( $arr , 'time' , $timestamp );
                        array_set( $arr , 'value' , $value );
                        array_set( $temp , $this->parameter_map_reverse05[$key] , $arr );
                    }
                    array_set( $data , 'pos_time' , $now );
                    array_set( $data , 'res' , $temp );

                    //返回结果
                    return response()->json(
                        [
                            'code' => '200' ,
                            'msg' => 'success' ,
                            'data' => $data,
                        ] );
                }else
                {
                    //返回错误
                    return response()->json(
                        [
                            'code' => '200' ,
                            'msg' => 'error' ,
                        ] );
                }
            }else
            {
                //查对应参数表
                //设备
                if (array_key_exists($id,$this->quip_map))
                {
                    $name = 'Dev' . $this->quip_map[ $id ];
                }else
                {
                    $name = 'Dev';
                }
                //参数
                $parameter = [];
                foreach ( $monitor_ids as $m )
                {
                    if (array_key_exists($m,$this->parameter_map))
                    {
                        $p = $this->parameter_map[ $m ];
                        array_push( $parameter , $p.'' );
                    }else
                    {
                        //传递错误的数据编号
                        return response()->json([
                            'code' => '200' ,
                            'msg' => 'error' ,
                        ]);
                    }
                }

                //查询是否有获取参数权限
                $refs = Speedy::getModelInstance( 'user_equip_ref' )
                    ->where( 'station_code' , $name )
                    //->where( 'userid' , $account )
                    ->where( 'password' , $secret )
                    ->first();

                if ($refs)
                {
                    //查询参数
                    $data = [];
                    $timestamp = Carbon::parse( $refs->timestamp )->timestamp . str_limit(Carbon::parse( $refs->timestamp )->micro,3,'');
                    $temp = [];
                    $result = Speedy::getModelInstance( 'equip' )->where( 'station_code' , $name )->orderBy( 'create_time' , 'DESC' )->first($parameter)->toArray();
                    foreach ($result as $key => $value)
                    {
                        $arr = [];
                        array_set( $arr , 'time' , $timestamp );
                        array_set( $arr , 'value' , $value );
                        array_set( $temp , $this->parameter_map_reverse[$key] , $arr );
                    }
                    array_set( $data , 'pos_time' , $now );
                    array_set( $data , 'res' , $temp );

                    //返回结果
                    return response()->json(
                        [
                            'code' => '200' ,
                            'msg' => 'success' ,
                            'data' => $data,
                        ] );
                }else
                {
                    //返回错误
                    return response()->json(
                        [
                            'code' => '200' ,
                            'msg' => 'error' ,
                        ] );
                }
            }

        }
    }
