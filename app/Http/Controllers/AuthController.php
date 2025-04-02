<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Hash; 
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class AuthController extends Controller
{
    public function login(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password' =>'required'
        ]);
        if(!Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return response()->json([
                'message'=>'invalid credentials! please try again'
            ],401);
            
        }
        $user = $request->user();
        $tokenData = $user->createToken($request->email);
        return response()->json([
            'access_token'=>$tokenData->accessToken,
        ]);
        
    }

    public function resetlink(Request $request){
       $email = $request->validate([
            'email'=>'required|email',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $remrnbertoken = Str::random(60);

        try{
            $admin = Auth::user()->email;

        if($request->email === $admin){
            Mail::to($request->email)->send(new ResetPassword($remrnbertoken));
            $user->remember_token	= $remrnbertoken;
            if($user->save()){
                return response()->json(['message'=>'succefull please chack your email'],200);
            }
        }else{
            return response()->json(['error'=> 'please chacke email and try again'],404);
        }
        }catch(\Exception $e){
            return response()->json(['error'=> $e->getMessage()],500);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=> 'server error'],500);
        }
    }
    public function reset(Request $request)
{
    $request->validate([
        'confirmedpassword' => 'required|min:8',
        'newpassword' => 'required|min:8',
        'id' => 'required'
    ]);

    try {
        $user = User::where('remember_token', $request->id)->firstOrFail();

        if ($request->newpassword === $request->confirmedpassword) {
            $user->password = Hash::make($request->newpassword);
            $user->remember_token = Str::random(60);
            $user->save();

            return response()->json([
                'message' => 'Your password has been updated.'
            ]);
        } else {
            return response()->json([
                'error' => 'Passwords do not match. Please confirm and try again.'
            ], 400);
        }
    } catch (ModelNotFoundException $e) {
        return response()->json([
            'error' => 'User not found.'
        ], 404);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Password reset not completed. Please try again later.'
        ], 500);
    }
}
public function resetpasswordview($id){
    return view('paswordreset',compact('id'));
}
}
