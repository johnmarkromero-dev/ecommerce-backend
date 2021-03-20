<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function History(){
       

        $getCart = DB::select('select a.* from transaction_headers a' );
        return $getCart;
    }
}
