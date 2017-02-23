<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repo\Company\CompanyRepo;

class CompanyController extends Controller
{
    private $company;

    public function __construct(CompanyRepo $company){
        $this->middleware('jwt.auth',["only" => [
            "store","update","destroy"
        ]]);
        return $this->company = $company;
    }

    public function getAll(){
        return response()->json($this->company->getAll());
    }

    public function getById($id){
        return response()->json($this->company->getById($id));
    }

    public function  update($id,Request $request){

        $this->validate($request,[
            'name' => 'required',
        ]);

        $company  =[
            'name' => $request->input('name'),

        ];

        return response()->json($this->company->update($id,$company));
    }

    public function destroy($id){
        return response()->json($this->company->delete($id));
    }
}
