<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auteur_id')->constrained('auteurs')->cascadeOnDelete();
            $table->string('titre', 200);
            $table->string('isbn', 20)->unique();
            $table->decimal('prix', 8, 2);
            $table->integer('stock')->default(0);
            $table->date('date_publication')->nullable();
            $table->boolean('disponible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};