<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repo\AdverType\AdverTypeRepo;

class AdverTypeController extends Controller
{
    private $advertype;

    public function __construct(AdverTypeRepo $advertype){
        return $this->advertype = $advertype;
    }

    public function getAll(){
        return response()->json($this->advertype->getAll());
    }

    public function getById($id){
        return response()->json($this->advertype->getById($id));
    }

    public function  update($id,Request $request){

        $this->validate($request,[
            'name' => 'required',
        ]);

        $advertype  =[
            'name' => $request->input('name'),
        ];

        return response()->json($this->advertype->update($id,$advertype));
    }

    public function destroy($id){
        return response()->json($this->advertype->delete($id));
    }
}
