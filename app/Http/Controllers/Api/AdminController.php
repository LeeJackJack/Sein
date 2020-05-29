<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Speedy;
    use Carbon\Carbon;

    class AdminController extends Controller
    {

        public function getData(Request $request)
        {
            $id = $request->get('id');
            $account = $request->get('account');
            $secret = $request->get('password');
            $name = 'Dev';
            if ($id == '9203M200500116')
            {
                $station_id = '01';
            }elseif ($id == '9203M200500117')
            {
                $station_id = '02';
            }elseif ($id == '9203M200500118')
            {
                $station_id = '03';
            }elseif ($id == '9203M200500119')
            {
                $station_id = '04';
            }elseif ($id == '9707A200500021')
            {
                $station_id = '05';
            }else
            {
                $station_id = null;
            }
            if ($station_id)
            {
                $name = $name.$id;
            }
            $now = Carbon::now()->timestamp;

            if ($station_id != null )
            {
                $refs = Speedy::getModelInstance('user_equip_ref')->where('station_code',$name)->where('userid',$account)->where('password',$secret)->first();
                $data = [];
                if ($refs)
                {
                    $timestamp = Carbon::parse($refs->timestamp)->timestamp;
                    $temp = [];
                    $result = Speedy::getModelInstance( 'equip' )->where( 'station_code' , $name )->orderBy( 'create_time' , 'DESC' )->first()->toArray();
                    foreach ( $result as $key => $value )
                    {
                        if ($value != null)
                        {
                            $arr = [];
                            switch ($key)
                            {
                                case 'so2':
                                    array_set($arr,'time',$timestamp);
                                    array_set($arr,'value',$value);
                                    array_set($temp,'671088644',$arr);
                                    break;
                                case 'co2':
                                    array_set($arr,'time',$timestamp);
                                    array_set($arr,'value',$value);
                                    array_set($temp,'671088645',$arr);
                                    break;
                                case 'no':
                                    array_set($arr,'time',$timestamp);
                                    array_set($arr,'value',$value);
                                    array_set($temp,'671088647',$arr);
                                    break;
                                case 'no2':
                                    array_set($arr,'time',$timestamp);
                                    array_set($arr,'value',$value);
                                    array_set($temp,'671088648',$arr);
                                    break;
                                case 'pm25':
                                    array_set($arr,'time',$timestamp);
                                    array_set($arr,'value',$value);
                                    array_set($temp,'671088649',$arr);
                                    break;
                                case 'pm10':
                                    array_set($arr,'time',$timestamp);
                                    array_set($arr,'value',$value);
                                    array_set($temp,'671088650',$arr);
                                    break;
                                case 'temp':
                                    array_set($arr,'time',$timestamp);
                                    array_set($arr,'value',$value);
                                    array_set($temp,'671088651',$arr);
                                    break;
                                case 'humi':
                                    array_set($arr,'time',$timestamp);
                                    array_set($arr,'value',$value);
                                    array_set($temp,'671088652',$arr);
                                    break;
                                case 'press':
                                    array_set($arr,'time',$timestamp);
                                    array_set($arr,'value',$value);
                                    array_set($temp,'671088653',$arr);
                                    break;
                                case 'speed':
                                    array_set($arr,'time',$timestamp);
                                    array_set($arr,'value',$value);
                                    array_set($temp,'671088654',$arr);
                                    break;
                                case 'direction':
                                    array_set($arr,'time',$timestamp);
                                    array_set($arr,'value',$value);
                                    array_set($temp,'671088655',$arr);
                                    break;
                            }
                        }
                    }
                    array_set($data,'post_time',$now);
                    array_set($data,'res',$temp);
                }
                return response()->json([
                    'code' => '200',
                    'msg' => 'success',
                    'data'=>$data,
                ]);
            }else
            {
                return response()->json([
                    'code' => '200',
                    'msg' => 'error',
                ]);
            }

        }

    }
