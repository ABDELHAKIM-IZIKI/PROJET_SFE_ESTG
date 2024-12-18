<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function  up(): void {
        Schema::create('caracteristiques', function (Blueprint $table) {
        $table->id();
        $table->foreignId('materiels_id')->constrained('materiels','id')->cascadeOnDelete()->cascadeOnUpdate();
        $table->string('nom');
        $table->string('valeur');
        $table->timestamps();
    });}
    

     public function down(): void
     {
    Schema::dropIfExists('caracteristiques');
     }
};
