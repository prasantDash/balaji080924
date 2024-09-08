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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('active')->default(1)->after('password');
            $table->integer('role')->default(1)->after('password');
            $table->integer('btob')->default(1)->after('password');
            $table->integer('btoc')->default(1)->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('active');
            $table->dropColumn('role');
            $table->dropColumn('btob');
            $table->dropColumn('btoc');
        });
    }
};
