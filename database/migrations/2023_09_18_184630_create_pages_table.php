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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_tr')->nullable();
            $table->string('slug')->unique();
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('pages')
                ->cascadeOnDelete();
            $table->foreignId('template_id')
                ->nullable()
                ->constrained('templates');
            $table->boolean('is_visible')->default(false);
            $table->string('image')->nullable();
            $table->json('content')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_title_tr')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_description_tr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
