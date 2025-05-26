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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->enum('type', ['video', 'news'])->nullable()->default(null);
            // $table->enum('status', ['en attente', 'publié', 'archivé'])->default('publié');
            $table->boolean('is_published')->default(true);
            $table->timestamp('scheduled_at')->nullable();
            $table->integer('views_count')->default(0);
            $table->string('youtube_url')->nullable();
            $table->string('file_path')->nullable(); // local video
            $table->string('cover_image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
