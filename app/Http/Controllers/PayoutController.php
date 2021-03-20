<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

use App\Models\TransactionHeader;
use App\Models\TransactionDetail;

use App\Models\Cart;

class PayoutController extends Controller
{
    public function save(Request $req){
        $id;
        $data = $req->validate([
            "transno"=>'required',
            "users_id"=>'required',
            "totalItems"=>'required',
            "totalAmount"=>'required',
            "vatableSales"=>'required',
            "vat"=>'required',
            "cashTendered"=>'required',
            "change"=>'required'
        ]); 
        $head = new TransactionHeader();
        $head->transno = '1';
        $head->users_id = '1';
        $head->totalItems = $req->totalItems;
        $head->totalAmount = $req->totalAmount;
        $head->vatableSales = $req->vatableSales;
        $head->vat = $req->vat;
        $head->cashTendered = $req->cashTendered;
        $head->change = $req->change;
        $head->save();
        $id = $head->id;  
        $result = Cart::all()->toArray();
        
        foreach($result as $index  => $key){
            $details = new TransactionDetail();
            $details->trans_header_id = $id ;
            $details->products_id  = $key["products_id"];
            $details->price  = $key["price"];
            $details->quantity  = $key["quantity"];
            $details->subtotal  = $key["subtotal"];
            $details->save();
        }
        Cart::truncate();
        return (["message"=>"Added!"]);


    }
}
