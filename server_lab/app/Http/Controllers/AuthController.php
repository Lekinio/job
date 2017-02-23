<?php

namespace App\Http\Controllers;

use App\Repo\User\UserRepo;
use Illuminate\Http\Request;

use Mockery\CountValidator\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use JWTAuth;

class AuthController extends Controller
{

    private $user;

    public function __construct(UserRepo $user){
        $this->user = $user;
    }

    public function signin(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only(['email','password']);

        try{
            if(! $token = JWTAuth::attempt($credentials)){
                return response()->json(['msg' => 'invalid credentials'], 401);
            }
        } catch(JWTexception $e){
            return response()->json(['msg' => 'Could not create token'], 500);
        }
        return response()->json(["token" => $token]);
    }



    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $user = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ];

        try {
            $user = $this->user->create($user);
        }   catch (Exception $e) {
            return response()->json(['error' => 'User already exists.']);
        }

        
        return response()->json(['msg' => 'User created']);
    }

    public function getAuthUser()
        {
            try {
                if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
                }

            } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                        return response()->json(['token_expired'], $e->getStatusCode());

                    } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                        return response()->json(['token_invalid'], $e->getStatusCode());

                    } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

                        return response()->json(['token_absent'], $e->getStatusCode());

                    }

            return response()->json(compact('user'));
        }

  
    public function getToken(){
                $token = JWTAuth::getToken();

                    if(! $token){
                        return $this->response->errorUnauthorized("Token is invalid");
                    }
                try {
                    $refreshedToken = JWTAuth::refresh($token);
                } catch (JWTException $e){
                    $this->response->error('Something went wrong');
                }


                return response()->json(compact('refreshedToken'));
            }
    }
