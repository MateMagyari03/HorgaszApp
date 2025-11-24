<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
{
    Schema::create('bans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('species_id')->constrained('species')->onDelete('cascade');
        $table->date('kezdete');
        $table->date('vege');
        $table->text('megjegyzes')->nullable();
        $table->timestamps();
    });
}


   
    public function down(): void
    {
        Schema::dropIfExists('bans');
    }
};
