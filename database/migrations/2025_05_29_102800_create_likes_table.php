<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address'); // adresse IP de l'utilisateur
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->boolean('is_like'); // true = like, false = dislike
            $table->timestamps();

            $table->unique(['ip_address', 'article_id']); // Un seul vote par user/article
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
