<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckTimeController extends Controller
{
    public function stampTime(Request $req)
    {
        $user = $req->user();

        $duplicateCheck  = \App\Models\CheckTime::where('user_id', $user->id)
        ->whereDate('created_at', date('Y-m-d'))
        ->where('type', $req->type)
        ->first();
        $check_type = 'ลงเวลาเข้างาน';
        if($req->type != 'check_in'){
            $check_type = 'ลงเวลาออกงาน';
        }

        if ($duplicateCheck){ 
        return response()->json([
            'success' => false,
            'message' => 'วันนี้คุณได้ทำการ '.$check_type .' ไปแล้ว',
            'data' => null
        ], 500);
}
        $checkTime = new \App\Models\CheckTime();
        $checkTime->type = $req->type; //type  check in or check out
        $checkTime->user_id = $user->id;
        $checkTime->location_id = $req->location_id;
        $checkTime->distance = $req->distance;
        $checkTime->lat = $req->lat;
        $checkTime->lng = $req->lng;

        if(!$checkTime->save()){
            return response()->json([
                'success' => false,
                'message' => 'ไม่สามารถ '. $check_type.' ได้',
                'data' => null
            ], 500);
        }

        
        return response()->json([
            'success' => true,
            'message' => $check_type . ' สำเร็จ',
            'data' => $checkTime
        ]);
    }

    public function history()
    {
        $date = request()->get('date');

        $user = request()->user();
    

        $timetables = \App\Models\CheckTime::where('user_id',$user->id);

        if($date){
            $timetables = $timetables->whereDate('created_at', $date);
        }

         $timetables = $timetables->orderBy('created_at', 'desc') // เรียงลำดับตามเวลาสร้างจากมากไปน้อย
                             ->paginate(10)
                             ->withQueryString();

        return response()->json([
            'success' => true,
            'message' => 'Check time history',
            'data' => $timetables
        ]);
    }

    public function detail()
    {
        $date = request()->get('date');

        $user = request()->user();

        $timetables = \App\Models\CheckTime::where('user_id',$user->id)
        ->whereDate('created_at', $date)
        ->get();

        $check_time = [
            'check_in' => null,
            'check_out' => null
        ];

        foreach ($timetables as $item) {
            if($item->type == 'check_in'){
                $check_time['check_in'] = $item->created_at;
            }else{
                $check_time['check_out'] = $item->created_at;
            }
        }

        return $check_time;
    }
}
