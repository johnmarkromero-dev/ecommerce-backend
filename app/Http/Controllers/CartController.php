<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;



class CartController extends Controller
{
    public function save(Request $req){
        $data = $req->validate([
            "id"=>'',
            "products_id"=>'required',
            "price"=>'required',
            "quantity"=>'required',
            "subtotal"=>'required'
        ]); 
        // $Products = Product::find($req->product_id);
        $Carts = new Cart();
        $Carts->products_id = $req->products_id;

        $Carts->price = $req->price;
        $Carts->quantity = $req->quantity;
        $Carts->subtotal = $req->subtotal; 
        $Carts->save();
        //  $Carts->id;
        // dd($Carts);
    }
    public function delete(Request $req){
         $cartItem = Cart::find($req->id);
         if($cartItem->delete()){
            return "Deleted!";
         }
           
    }
    public function show(){
        $getCart = DB::table('carts')
            ->leftJoin('products', 'carts.products_id', '=', 'products.id')
            ->select('carts.id','carts.products_id','products.name','carts.price','carts.quantity','carts.subtotal','products.picture')
            ->get();
        return $getCart;

          
   }
}
