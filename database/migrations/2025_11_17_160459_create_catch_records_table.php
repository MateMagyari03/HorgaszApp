<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
{
    Schema::create('catch_records', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('species_id')->constrained('species')->onDelete('cascade');
        $table->foreignId('water_id')->constrained('waters')->onDelete('cascade');
        $table->date('datum');
        $table->float('suly');
        $table->float('hossz')->nullable();
        $table->text('megjegyzes')->nullable();
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('catch_records');
    }
};
