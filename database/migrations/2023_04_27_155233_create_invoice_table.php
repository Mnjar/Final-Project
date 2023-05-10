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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_number')->nullable();

            $table->unsignedBigInteger('product_name')->unsigned();
            $table->foreign('product_name')->references('id')->on('barangs')->onDelete('restrict');

            $table->unsignedBigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->integer('quantity');

            $table->unsignedBigInteger('price');
            $table->foreign('price')->references('id')->on('barangs')->onDelete('restrict');;

            $table->integer('total_amount');

            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
