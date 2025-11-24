<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
{
    Schema::create('waters', function (Blueprint $table) {
        $table->id();
        $table->string('nev');
        $table->string('helyszin');
        $table->string('tipus')->nullable(); 
        $table->text('leiras')->nullable();
        $table->string('kep')->nullable();
        $table->timestamps();
    });
}


   
    public function down(): void
    {
        Schema::dropIfExists('waters');
    }
};
