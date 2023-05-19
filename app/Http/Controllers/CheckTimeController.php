<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckTimeController extends Controller
{
    public function history()
    {
        $date = request()->get('date');

        $user_id = request()->get('user_id');
    

        $timetables = \App\Models\CheckTime::select('check_times.*', 
        'users.name as user_name',
        'users.position',
         'locations.name as location_name',
         'locations.detail as location_detail'
         )
        
        ->join('users', 'users.id', '=', 'check_times.user_id')
        ->join('locations', 'locations.id', '=', 'check_times.location_id');

        if(auth()->user()->role == 'user'){
            $timetables = $timetables->where('check_times.user_id', auth()->user()->id);
        }

        if($date){
            $timetables = $timetables->whereDate('check_times.created_at', $date);
        }

        $timetables = $timetables->paginate(10)->withQueryString();
        return view('pages.history', [
            'timetables' => $timetables
        ]);
    }
}
