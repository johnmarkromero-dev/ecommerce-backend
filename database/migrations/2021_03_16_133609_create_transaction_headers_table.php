<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_headers', function (Blueprint $table) {
            $table->id();
            $table->String("transno"); 
            $table->integer("users_id")->unsigned();
            $table->decimal("totalItems",15,2); 
            $table->decimal("totalAmount",15,2); 
            $table->decimal("vatableSales",15,2); 
            $table->decimal("vat",15,2); 
            $table->decimal("cashTendered",15,2);
            $table->decimal("change",15,2);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_headers');
    }
}
