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
        Schema::create('student_works', function (Blueprint $table) {
            $table->id('work_id');
            $table->unsignedBigInteger('program_id');
            $table->string('title_th');
            $table->string('title_en')->nullable();
            $table->text('description_th')->nullable();
            $table->text('description_en')->nullable();
            $table->timestamps();
            
            $table->foreign('program_id')->references('program_id')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_works');
    }
};
