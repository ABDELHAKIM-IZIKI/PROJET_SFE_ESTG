<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function  up(): void {
        Schema::create('reclamations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('registres_id')->constrained('registres','id')->cascadeOnDelete()->cascadeOnUpdate();
        $table->foreignId('users_id')->constrained('users','id')->cascadeOnDelete()->cascadeOnUpdate();
        $table->text('reclamation');
        $table->date('date');
        $table->boolean('vue');
        $table->timestamps();
    });}
    

     public function down(): void
     {
    Schema::dropIfExists('reclamations');
     }
};
