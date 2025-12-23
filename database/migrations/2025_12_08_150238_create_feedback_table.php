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
        Schema::create('feedback', function (Blueprint $table) { // Table name usually singular or plural? Laravel convention: plural 'feedbacks'. But model is Feedback. Let's stick to plural 'feedbacks' or check user plan using 'Feedbacks'?
            // Plan said: Feedbacks Table. `make:model Feedback -m` creates `feedback_table` (singular table name usually?) or plural?
            // Actually `make:model Feedback -m` creates plural table name if using standard conventions, but "feedback" is uncountable in English. Laravel usually makes it "feedback".
            // The file name is `create_feedback_table.php`.
            // I will use `feedback` as table name to match migration filename.
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
