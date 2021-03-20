<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    private $categories; 
    public function save(Request $req){
 
        $data = $req->validate([
            "code"=>'required',
            "name"=>'required',
            "description"=>'required'
        ]); 

        if ($req->id > 0) { 
            $categories = Category::find($req->id); 
        }else{
            $categories = new Category; 
        }

            $categories->code = $req->code;
            $categories->name = $req->name;
            $categories->description = $req->description;
            $categories->save();
            return response(["message"=>"Saved Sucessfully!!"]); 
    }

    public function delete(Request $req){
        $category = Category::find($req->id);
        $category->delete();
    }
    public function show(){
        return Category::all();
    }
}
