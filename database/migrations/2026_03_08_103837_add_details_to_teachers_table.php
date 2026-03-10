<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->string('birth_place_date')->nullable()->after('name');
            $table->text('address')->nullable()->after('birth_place_date');
            $table->string('email')->nullable()->after('nip');
            $table->text('education_history')->nullable()->after('subject');
            $table->text('employment_history')->nullable()->after('education_history');
            $table->text('motivation_message')->nullable()->after('employment_history');
        });
    }

    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn([
                'birth_place_date',
                'address',
                'email',
                'education_history',
                'employment_history',
                'motivation_message'
            ]);
        });
    }
};
