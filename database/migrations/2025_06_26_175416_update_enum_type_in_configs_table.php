<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE configs MODIFY type ENUM('phone', 'email', 'facebook', 'address', 'instagram', 'twitter', 'whatsapp', 'youtube', 'linkedin', 'numeropub')");
    }

    public function down(): void
    {
        // Si tu veux revenir en arrière
        DB::statement("ALTER TABLE configs MODIFY type ENUM('phone', 'email', 'facebook', 'address', 'instagram', 'twitter', 'whatsapp', 'youtube', 'linkedin', 'numeropub')");
    }
};
