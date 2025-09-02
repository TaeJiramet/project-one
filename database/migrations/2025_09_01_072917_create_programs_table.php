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
            $table->id('program_id');
            $table->string('program_name_th');
            $table->string('program_name_en');
            $table->string('degree_th');
            $table->string('degree_en');
            $table->smallInteger('credits_required');
            $table->text('language_th')->nullable();
            $table->decimal('tuition_fee', 10, 2)->nullable();
            $table->year('curriculum_year')->nullable();
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
