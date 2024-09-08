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
        Schema::create('itemcarats', function (Blueprint $table) {
            $table->id();
            $table->string('itemcarat');
            $table->bigInteger('user_id');
            $table->bigInteger('item_id')->foreign('item_id')->references('id')->on('items');
            $table->integer('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itemcarats');
    }
};
