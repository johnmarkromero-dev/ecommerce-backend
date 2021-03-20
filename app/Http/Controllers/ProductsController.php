<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Factory;
use Illuminate\Support\Str; 
use Illuminate\Http\Request; 
use App\Models\Product; 
use App\Http\Resources\ProductCollection ; 
class ProductsController extends Controller
{
    public function save(Request $req){
 
        $data = array($req->validate([
            "code"=>"required",
            "name"=>"required",
            "price"=>"required", 
            "categories_id"=>"required",
        ])); 

        if ($req->hasFIle('picture')) {
            $data_image = $req->validate([
                "picture"=>"File|image"
            ]); 
        } 

        // SAVING DATA 
        if ($req->id) {
            $products = Product::find($req->id);
        }else{
            $products = new Product;
        }  
        $products->picture = $req->picture;   
        $products->code = $req->code;
        $products->name = $req->name;
        $products->price = $req->price; 
        $products->categories_id = $req->categories_id; 
        $products->save(); 
        return product::all();  


        // http://127.0.0.1:8000/storage/uploads/download.png
    }

    public function delete(Request $req){ 
        $products = Product::find($req->id); 
        $products->delete(); 
    }
    public function show(Request $req){

        $products = Product::all();
        return new ProductCollection($products);
    }

    
}