<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('auteurs', function (Blueprint $table) {
           $table->id();
           $table->string('nom', 100);
           $table->string('prenom', 100);
           $table->string('email', 150)->unique();
           $table->date('date_naissance')->nullable();
           $table->string('nationalite', 100)->nullable();
           $table->boolean('actif')->default(true);
           $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('auteurs');
    }
};
