<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->boolean('privacy_accepted')->default(false);
            $table->boolean('terms_accepted')->default(false);
            $table->boolean('marketing_consent')->default(false);

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'privacy_accepted',
                'terms_accepted',
                'marketing_consent'
            ]);

        });
    }
};