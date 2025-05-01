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
            $table->unsignedBigInteger('Consultant_ID');
            $table->string('Appointment_Topic');
            $table->text('Appointment_Note')->nullable();
            $table->time('Appointment_StartTime');
            $table->time('Appointment_EndTime');
            $table->date('AppointmentDate');
            $table->text('User_Information');
            $table->text('Notes')->nullable();
            $table->foreign('User_ID')->references('User_ID')->on('users')->onDelete('cascade');
            $table->foreign('Consultant_ID')->references('Consultant_ID')->on('consultants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};