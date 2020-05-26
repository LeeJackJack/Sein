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
            $name = 'Dev'.$id;
            $data = Speedy::getModelInstance('equip')->where('station_code',$name)->orderBy('create_time','DESC')->first();
            return response()->json([
                'data'=>$data,
            ]);
        }

    }
