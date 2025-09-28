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
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id('alumnus_id');
            $table->unsignedBigInteger('program_id');
            $table->string('name_th');
            $table->string('name_en')->nullable();
            $table->string('position_th')->nullable();
            $table->string('position_en')->nullable();
            $table->string('company_th')->nullable();
            $table->string('company_en')->nullable();
            $table->text('biography_th')->nullable();
            $table->text('biography_en')->nullable();
            $table->timestamps();
            
            $table->foreign('program_id')->references('program_id')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
