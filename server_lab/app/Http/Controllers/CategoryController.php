<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repo\Category\CategoryRepo;

class CategoryController extends Controller
{
    private $category;

    public function __construct(CategoryRepo $category){
        return $this->category = $category;
    }

    public function getAll(){
        return response()->json($this->category->getAll());
    }

    public function getById($id){
        return response()->json($this->category->getById($id));
    }

    public function  update($id,Request $request){

        $this->validate($request,[
            'name' => 'required',
        ]);

        $category  =[
            'name' => $request->input('name'),
        ];

        return response()->json($this->category->update($id,$category));
    }

    public function destroy($id){
        return response()->json($this->category->delete($id));
    }
}
