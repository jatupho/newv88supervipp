<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Check;

class CheckController extends Controller
{
    /////สแกน แล้วเชคข้อมูลลงดาต้า
        public function store(Request $request) {

        $check = Check::where('C_DATE', $request->currentDate)
                        ->where('email', $request->email)
                        ->first();
                      
        if (!$check) {
            $check = new Check();
            $check->user_id = $request->id;
            $check->position = $request->position;
            $check->name = $request->name;
            $check->email = $request->email;
            $check->C_DATE = $request->currentDate;
            $check->LOCATION = $request->LOCATION;
            $check->d_INOUT = $request->d_INOUT;
        }
        
        if ($request->types === 'Check IN') {
            if (!$check->CHECK_IN) {
                $check->distance_IN = $request->distanceInMeters;
                $check->CHECK_IN = $request->currentTime;
                
            } else {
                
                return response()->json(['error' => 'คุณเคยเช็คอินไปแล้ววันนี้'], 422);
            }
        } else if ($request->types === 'Check OUT') {
            if (!$check->CHECK_OUT) {
                $check->distance_OUT = $request->distanceInMeters;
                $check->CHECK_OUT = $request->currentTime;
               
            } else {
                
                return response()->json(['error' => 'คุณเคยเช็คเอาท์ไปแล้ววันนี้'], 422);
            }
        } else {
            // handle other cases
        }
        
         $check->save();
        
         return response()->json(['success' => true]);
    }
    
////ดึงประวัติการเช็คราบุคคลตาม User_id////
    public function tabel(Request $request ,$user_id)
    {
        $checks = Check::where('user_id', $user_id)->get();
        return response()->json($checks);
    }

   
        public function tabelx(Request $request, $user_id)
    {
    $c_date = $request->input('C_DATE');
    $checks = Check::where('user_id', $user_id)
                    ->where('C_DATE', $c_date)
                    ->get();
    return response()->json($checks);
    }

    



////ด้านบนของapp

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////ด้านล่างของweb

















    ///Wep
    public function index()
    {
        $checks = Check::all();
        $checks = Check::orderBy('C_DATE', 'desc')->get();
        //$checks = Check::orderBy('user_id', 'asc')->get();
        return view('checks', compact('checks'));
    }


    public function searchid($user_id)
{
    $checks = Check::where('user_id', $user_id)->orderBy('C_DATE', 'desc')->get();
   

    $output = '';
    foreach ($checks as $check) {
        $output .= '<tr>';
        $output .= '<td>'. date_format(date_create($check->C_DATE), 'd/m/Y') .'</td>';
        $output .= '<td>'. $check->user_id .'</td>';
        $output .= '<td>'. $check->position .'</td>';
        $output .= '<td>'. $check->name .'</td>';
        $output .= '<td>'. $check->email .'</td>';
        $output .= '<td>'. $check->CHECK_IN .'</td>';
        $output .= '<td>'. $check->distance_IN .'</td>';
        $output .= '<td>'. $check->CHECK_OUT .'</td>';
        $output .= '<td>'. $check->distance_OUT .'</td>';
        $output .= '<td>'. $check->LOCATION .'</td>';
        $output .= '<td>'. $check->d_INOUT .'</td>';
        $output .= '</tr>';
    }

    return response()->json($output);
}


public function searchname($name)
{
    $checks = Check::where('name', $name)->orderBy('C_DATE', 'desc')->get();
   

    $output = '';
    foreach ($checks as $check) {
        $output .= '<tr>';
        $output .= '<td>'. date_format(date_create($check->C_DATE), 'd/m/Y') .'</td>';
        $output .= '<td>'. $check->user_id .'</td>';
        $output .= '<td>'. $check->position .'</td>';
        $output .= '<td>'. $check->name .'</td>';
        $output .= '<td>'. $check->email .'</td>';
        $output .= '<td>'. $check->CHECK_IN .'</td>';
        $output .= '<td>'. $check->distance_IN .'</td>';
        $output .= '<td>'. $check->CHECK_OUT .'</td>';
        $output .= '<td>'. $check->distance_OUT .'</td>';
        $output .= '<td>'. $check->LOCATION .'</td>';
        $output .= '<td>'. $check->d_INOUT .'</td>';
        $output .= '</tr>';
    }

    return response()->json($output);
}


public function searchemail($email)
{
    $checks = Check::where('email', $email)->orderBy('C_DATE', 'desc')->get();
   

    $output = '';
    foreach ($checks as $check) {
        $output .= '<tr>';
        $output .= '<td>'. date_format(date_create($check->C_DATE), 'd/m/Y') .'</td>';
        $output .= '<td>'. $check->user_id .'</td>';
        $output .= '<td>'. $check->position .'</td>';
        $output .= '<td>'. $check->name .'</td>';
        $output .= '<td>'. $check->email .'</td>';
        $output .= '<td>'. $check->CHECK_IN .'</td>';
        $output .= '<td>'. $check->distance_IN .'</td>';
        $output .= '<td>'. $check->CHECK_OUT .'</td>';
        $output .= '<td>'. $check->distance_OUT .'</td>';
        $output .= '<td>'. $check->LOCATION .'</td>';
        $output .= '<td>'. $check->d_INOUT .'</td>';
        $output .= '</tr>';
    }

    return response()->json($output);
}

public function searchlocation($location)
{
    $checks = Check::where('location', $location)->orderBy('C_DATE', 'desc')->get();
   

    $output = '';
    foreach ($checks as $check) {
        $output .= '<tr>';
        $output .= '<td>'. date_format(date_create($check->C_DATE), 'd/m/Y') .'</td>';
        $output .= '<td>'. $check->user_id .'</td>';
        $output .= '<td>'. $check->position .'</td>';
        $output .= '<td>'. $check->name .'</td>';
        $output .= '<td>'. $check->email .'</td>';
        $output .= '<td>'. $check->CHECK_IN .'</td>';
        $output .= '<td>'. $check->distance_IN .'</td>';
        $output .= '<td>'. $check->CHECK_OUT .'</td>';
        $output .= '<td>'. $check->distance_OUT .'</td>';
        $output .= '<td>'. $check->LOCATION .'</td>';
        $output .= '<td>'. $check->d_INOUT .'</td>';
        $output .= '</tr>';
    }

    return response()->json($output);
}


public function searchx(Request $request)
    {
        $column = $request->input('column');
        $search = $request->input('search');

        $checks = Check::where($column, 'LIKE', '%' . $search . '%')->get();

        return view('checks', compact('checks'));
    }

    
  
// public function search($columnName)
// {
//     $checks = Check::select($columnName)->distinct()->get();
//     return response()->json($checks);
// }



    
}
