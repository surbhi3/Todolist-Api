<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function register(Request $request){
        //  dd($request->all());
        return User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>  Hash::make($request ->input('password')),
            'api_token' => app('hash')->make('ge2guihcksnlkcsjopjj'),
        ]);
    }

//    //    public function login(Request $request)
//
//    {
//
//        $this->validate($request, [
//
//            'email' => 'required',
//
//            'password' => 'required'
//
//        ]);
//
//        $user = User::where('email', $request->input('email'))->first();
//
//        if(Hash::check($request->input('password'), $user->password)){
//
//            $apitoken = base64_encode(str_random(40));
//
//            User::where('email', $request->input('email'))->update(['api_token' => "$apitoken"]);;
//
//            return response()->json(['status' => 'success','api_token' => $apitoken]);
//
//        }else{
//
//            return response()->json(['status' => 'fail'],401);
//
//        }
//
//    }

    public function login()
    {
        return response()->json(['status'=>'logged In', 'statuscode'=>200]);
    }

}
