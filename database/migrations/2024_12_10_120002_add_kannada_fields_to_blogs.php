<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('title_kn')->nullable()->after('title');
            $table->string('excerpt_kn', 500)->nullable()->after('excerpt');
            $table->longText('content_kn')->nullable()->after('content');
            $table->string('author_kn')->nullable()->after('author');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn([
                'title_kn',
                'excerpt_kn',
                'content_kn',
                'author_kn'
            ]);
        });
    }
};
