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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique(); // Unique slug for URL
            $table->boolean('status')->default(1); // 1 = Active, 0 = Inactive
            $table->boolean('is_active')->default(1); // Separate active status if needed
            $table->string('meta_title')->nullable(); // SEO Meta Title
            $table->text('meta_description')->nullable(); // SEO Meta Description
            $table->text('meta_keyword')->nullable(); // SEO Meta Keywords
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
