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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('prod_id')->foreign('prod_id')->references('id')->on('products');
            $table->bigInteger('user_id');
            $table->float('amount');
            $table->bigInteger('item');
            $table->bigInteger('carat');
            $table->float('weight');
            $table->double('grandTotal');
            $table->float('less');
            $table->float('netweight'); 
            $table->string('tunch');
            $table->string('lobour'); 
            $table->string('feiue');
            $table->integer('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
