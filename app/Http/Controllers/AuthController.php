<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
            'position' => 'required'
        ]);

        if($validator->fails()){
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'User register successfully'
        ];

        return response()->json($response,200);
    }

    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;
            $success['id'] = $user->id;
            $success['position'] = $user->position;
    
            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User login successfully'
            ];
    
            // Check for duplicate keys in $success array
            $keys = array_keys($success);
            foreach($keys as $key) {
                if(array_key_exists($key, $success)) {
                    $success[$key] .= '_' . uniqid();
                }
            }
    
            return response()->json($response,200);
        }else{
            $response = [
                'success' => false,
                'message' => 'Unauthorised'
            ];
            return response()->json($response);
        }
    }
    
}
