<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function  up(): void {
        Schema::create('registres', function (Blueprint $table) {
        $table->id();
        $table->foreignId('users_id')->constrained('users','id')->cascadeOnDelete()->cascadeOnUpdate();
        $table->foreignId('materiels_id')->constrained('materiels','id')->cascadeOnDelete()->cascadeOnUpdate();
        $table->foreignId('etats_id')->constrained('etats','id')->cascadeOnDelete()->cascadeOnUpdate();
        $table->text('rapport');
        $table->string('lieu');
        $table->date('date');
        $table->text('QR');
        $table->timestamps();
    });}
    

     public function down(): void
     {
    Schema::dropIfExists('registres');
     }
};
