<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('graduation_year')->nullable();
            $table->string('program')->nullable(); // e.g. BIT, BCS
            $table->string('current_position')->nullable();
            $table->string('current_company')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->text('bio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'graduation_year',
                'program',
                'current_position',
                'current_company',
                'phone_number',
                'linkedin_url',
                'bio',
            ]);
        });
    }
};
