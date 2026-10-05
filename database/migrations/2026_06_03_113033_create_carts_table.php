<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id('cart_id');
            $table->unsignedBigInteger('ch_id'); 
            $table->string('name'); 
            $table->decimal('price', 10, 2);
            $table->integer('quantity'); 
            $table->decimal('totalPrice', 10, 2);
            
            $table->foreign('ch_id')->references('checkout_id')->on('checkouts')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
