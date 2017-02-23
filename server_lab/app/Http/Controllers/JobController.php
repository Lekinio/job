<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repo\Job\JobRepo;

use JWTAuth;

class JobController extends Controller
{
    private $job;
    private $user;

    public function __construct(JobRepo $job){
        $this->middleware('jwt.auth',[
            'only' => [
                'store','update','destroy'
            ]
        ]);
        return $this->job = $job;
    }

    public function index(){
        $jobs = $this->job->getAll();

        return view('welcome',compact('jobs'));
    }

     public function create(Request $request){

         $user = JWTAuth::parseToke()->toUser();

         $job  =[
             'name' => $request->input('name'),
             'body' => $request->input('body'),
             'salary' => $request->input('salary'),
             'user_id' => $request->input('user_id'),
             'company_id' => $request->input('company_id'),
             'category_id' => $request->input('category_id'),
             'location_id' => $request->input('location_id'),
             'adver_type_id' => $request->input('adver_type_id')
         ];
            return response()->json($this->job->create($job),['user' => $user]);

     }

    public function getAll(){
        return response()->json($this->job->getAll());
    }

    public function getById($id){
        return response()->json($this->job->getById($id));
    }

    public function  update($id,Request $request){
        $this->validate($request,[
            'name' => 'required',
            'body' => 'required',
            'salary' => 'required',
            'user_id' => 'required',
            'company_id' => 'required',
            'category_id' => 'required',
            'location_id' => 'required',
            'adver_type_id' => 'required'
        ]);

        $job  =[
            'name' => $request->input('name'),
            'body' => $request->input('body'),
            'salary' => $request->input('salary'),
            'user_id' => $request->input('user_id'),
            'company_id' => $request->input('company_id'),
            'category_id' => $request->input('category_id'),
            'location_id' => $request->input('location_id'),
            'adver_type_id' => $request->input('adver_type_id')
        ];

        return response()->json($this->job->update($id,$job));
    }

    public function destroy($id){
        return response()->json($this->job->delete($id));
    }
}
