<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('id', \auth()->id())->with('language')->first();
		
        return response()->json([
            'success' => true,
            'data' => $user,
        ], 200);

    }

    public function store(UserStoreRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'age' => $request->age,
            'profession' => $request->profession,
            'address' => $request->address,

        ]);

        $token = $user['token'] = $user->createToken('Portfolio')->plainTextToken;

        return response()->json([
            'success' => true,
            'data' => $user,
            'token' =>$token
        ]);
    }

    public function login(Request $request){
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            $user = $request->user();
			
            $token = $user['token'] = $user->createToken('Portfolio')->plainTextToken;
            return response()->json([
                'success' => true,
                'data' => $user,
                'token'=> $token,
	            
            ]);
        }
//        }else{
//            dd(false);
//        }
    }
}
