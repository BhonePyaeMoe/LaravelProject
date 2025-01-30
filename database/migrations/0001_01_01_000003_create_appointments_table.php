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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('Appointment_ID');
            $table->unsignedBigInteger('User_ID');
            $table->date('AppointmentDate');
            $table->time('Appointment_StartTime');
            $table->time('Appointment_EndTime');
            $table->string('Appointment_Topic');
            $table->text('Appointment_Note')->nullable(); 
            $table->text('User_Information')->nullable();
            $table->foreign('User_ID')->references('User_ID')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id('EnrollmentID');
            $table->unsignedBigInteger('Appointment_ID');
            $table->text('EnrollmentNote')->nullable();
            $table->boolean('IsComplete')->default(false);
            $table->foreign('Appointment_ID')->references('Appointment_ID')->on('appointments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
        Schema::dropIfExists('appointments');
    }
};