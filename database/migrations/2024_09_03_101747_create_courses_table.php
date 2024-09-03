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
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id')->autoIncrement();
            $table->string('course_code')->unique();
            $table->year('curriculum_year');
            $table->string('course_name');
            $table->boolean('course_active_status')->default(true);
            $table->timestamps();

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            
            $table->ipAddress('ip_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
