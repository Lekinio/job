<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repo\Location\LocationRepo;

class LocationController extends Controller
{
    private $location;

    public function __construct(LocationRepo $location){
        return $this->location = $location;
    }

    public function getAll(){
        return response()->json($this->location->getAll());
    }

    public function getById($id){
        return response()->json($this->location->getById($id));
    }

    public function  update($id,Request $request){

        $this->validate($request,[
            'name' => 'required',
        ]);

        $location  =[
            'name' => $request->input('name'),
        ];

        return response()->json($this->location->update($id,$location));
    }

    public function destroy($id){
        return response()->json($this->location->delete($id));
    }

}
