<?php


namespace App\Http\Controllers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cache;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    //
   
      //  function index(Request $request){
          //  $user= User::where('email', $request->email)->first();
            // print_r($data);
             //   if (!$user || !Hash::check($request->password, $user->password)) {
              //      return response([
                //        'message' => ['These credentials do not match our records.']
               //     ], 404);
              //  }

              //  $token = $user->createToken('my-app-token')->plainTextToken;

              //  $response = [
               //     'user' => $user,
              //      'token' => $token
               // ];

           // return response($response, 201);
           // }

            public function userdata(Request $request)
            {
                $user = User::all();
                return response()->json($user);
            }

            public function userOnlineStatus(Request $request)
            {
              $users = User::all();
              foreach ($users as $user) {
                  if (Cache::has('user-is-online-' . $user->id))
                      echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans();
                  else
                      echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans();
              }
          }
            
  }
