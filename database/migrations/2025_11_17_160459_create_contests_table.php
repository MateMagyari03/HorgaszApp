<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->string('helyszin');
            $table->date('datum_kezdete');
            $table->date('datum_vege');
            $table->integer('dij')->nullable();
            $table->integer('max_letszam')->nullable();
            $table->text('leiras')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contests');
    }
};
