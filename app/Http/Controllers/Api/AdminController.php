<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Collection;
    use Speedy;
    use Illuminate\Support\Facades\Storage;

    class AdminController extends Controller
    {

        public function getData(Request $request)
        {
            $account = $request->get('account');
            $secret = $request->get('secret');

            $refs = Speedy::getModelInstance('user_equip_ref')->where('userid',$account)->where('password',$secret)->get(['station_code']);
            $data=[];
            foreach ($refs as $r)
            {
                $result = Speedy::getModelInstance( 'equip' )->where( 'station_code' , $r->station_code )->orderBy( 'create_time' , 'DESC' )->first()->toArray();
                $temp = [];
                foreach ( $result as $key => $value )
                {
                    if ($value)
                    {
                        array_set($temp,$key,$value);
                    }
                }
                array_push($data,$temp);
            }
            return response()->json([
                'data'=>$data,
            ]);
        }

    }
