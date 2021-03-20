<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportCsvToDbController;

Route::group(['prefix'=>'Accounts'],function(){
    Route::post("imports","App\Http\Controllers\ImportCsvToDbController@imports"); 
    Route::get("show","App\Http\Controllers\ImportCsvToDbController@show"); 
}); 

// CATEGORY -----
Route::group(['prefix'=>'Category'],function(){
    Route::post('save','App\Http\Controllers\CategoryController@save');
    Route::get('show','App\Http\Controllers\CategoryController@show'); 
    Route::post('delete','App\Http\Controllers\CategoryController@delete');   
});

// PRODUCTS -----
Route::group(['prefix'=>'product'],function(){
    Route::post('save','App\Http\Controllers\ProductsController@save');
    Route::get('show','App\Http\Controllers\ProductsController@show'); 
    Route::post('delete','App\Http\Controllers\ProductsController@delete');  
});


// Add to Cart -----
Route::group(['prefix'=>'cart'],function(){
    Route::post('save','App\Http\Controllers\CartController@save');
    Route::get('show','App\Http\Controllers\CartController@show'); 
    Route::post('delete','App\Http\Controllers\CartController@delete');  
});

// Payout -----
Route::group(['prefix'=>'payout'],function(){
    Route::post('save','App\Http\Controllers\PayoutController@save');
    Route::get('show','App\Http\Controllers\PayoutController@show'); 
    Route::post('delete','App\Http\Controllers\PayoutController@delete');  
});

// Reports -----
Route::group(['prefix'=>'report'],function(){
    Route::get('History','App\Http\Controllers\ReportsController@History'); 
});
  