<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repo\User\UserRepo;

use App\User;

class UserController extends Controller
{
    private $user;

        public function __construct(UserRepo $user){
                $this->middleware('jwt.auth',[
                'only' => [
                    'store','update','destroy'
                ]
            ]);
                return $this->user = $user;
        }

        public function getAll(){
            return response()->json($this->user->getAll());
        }

        public function getById($id){
                return response()->json($this->user->getById($id));
        }

        public function store(){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required'
            ]);
            $user = [
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ];

            $user = $this->user->create($user);

            $response = [
                'msg' => 'User created',
                'user' => $user
            ];

            return response()->json($response);
    }

        public function  update($id,Request $request){

            $this->validate($request,[
                    'name' => 'required',
                    'lastname' => 'required',
                    'phone' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|min:6'
            ]);

            $user  =[
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email')
            ];

            return response()->json($this->user->update($id,$user));
        }

        public function destroy($id){
            return response()->json($this->user->delete($id));
        }

}
