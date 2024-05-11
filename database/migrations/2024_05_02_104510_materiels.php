<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function  up(): void {
        Schema::create('materiels', function (Blueprint $table) {
        $table->id();
        $table->foreignId('categories_id')->constrained('categories','id')->cascadeOnDelete()->cascadeOnUpdate();
        $table->foreignId('marques_id')->constrained('marques','id')->cascadeOnDelete()->cascadeOnUpdate();
        $table->string('nom');
        $table->string('model');
        $table->text('description');
        $table->string('image');
        $table->Integer('quantite');
        $table->string('barcode');
        $table->date('date');
        $table->timestamps();
    });}
    

     public function down(): void
     {
    Schema::dropIfExists('materiels');
     }

}; 
