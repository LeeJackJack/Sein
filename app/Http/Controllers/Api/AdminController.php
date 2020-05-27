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
            $id = $request->get('id');
            $account = $request->get('account');
            $secret = $request->get('secret');
            $name = 'Dev'.$id;

            $refs = Speedy::getModelInstance('user_equip_ref')->where('station_code',$name)->where('userid',$account)->where('password',$secret)->first();
            $data = [];
            if ($refs)
            {
                $result = Speedy::getModelInstance( 'equip' )->where( 'station_code' , $name )->orderBy( 'create_time' , 'DESC' )->first()->toArray();
                foreach ( $result as $key => $value )
                {
                    if ($value)
                    {
                        array_set($data,$key,$value);
                    }
                }
            }
            return response()->json([
                'data'=>$data,
            ]);
        }

    }
