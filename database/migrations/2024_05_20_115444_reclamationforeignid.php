<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function  up(): void {
        Schema::table('reclamations', function (Blueprint $table) {
        $table->foreignId('users_id');
        $table->foreignId('users_id')->constrained('users','id')->cascadeOnDelete()->cascadeOnUpdate();
       
    });}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
