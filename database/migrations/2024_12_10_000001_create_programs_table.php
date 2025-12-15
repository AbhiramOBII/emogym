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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('description');
            $table->text('short_description');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('who_is_this_for')->nullable();
            $table->enum('type', ['online', 'offline'])->default('offline');
            $table->string('link')->nullable(); // For online programs
            $table->text('address')->nullable(); // For offline programs
            $table->decimal('cost', 10, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
