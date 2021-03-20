<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->integer("trans_header_id")->unsigned();
            $table->integer("products_id")->unsigned();
            $table->decimal("price",15,2);
            $table->decimal("quantity",15,2); 
            $table->decimal("subtotal",15,2);  
            $table->timestamps();
            $table->foreign("trans_header_id")->references("id")->on("transaction_headers")->onDelete("restrict");
            $table->foreign("products_id")->references("id")->on("products")->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}
