<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->string('title_kn')->nullable()->after('title');
            $table->text('description_kn')->nullable()->after('description');
            $table->text('short_description_kn')->nullable()->after('short_description');
            $table->string('who_is_this_for_kn')->nullable()->after('who_is_this_for');
            $table->text('what_will_you_learn_kn')->nullable()->after('what_will_you_learn');
        });
    }

    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn([
                'title_kn',
                'description_kn',
                'short_description_kn',
                'who_is_this_for_kn',
                'what_will_you_learn_kn'
            ]);
        });
    }
};
