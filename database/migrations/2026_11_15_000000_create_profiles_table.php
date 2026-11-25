<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('course');
            $table->string('year_section');
            $table->string('photo_path')->nullable();
            $table->text('motto');
            $table->text('bible_verse');
            $table->string('bible_verse_ref')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('email')->nullable();
            $table->string('github_url')->nullable();
            $table->string('gcash_name')->nullable();
            $table->string('gcash_number')->nullable();
            $table->string('gcash_qr_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
