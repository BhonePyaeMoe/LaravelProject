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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id('Schedule_ID'); // Primary Key
            $table->time('StartTime');
            $table->time('EndTime');
            $table->date('Schedule_Date');
            $table->timestamps();
        });

        Schema::create('workschedules', function (Blueprint $table) {
            $table->id('WorkSchedule_ID'); // Primary Key
            $table->unsignedBigInteger('Schedule_ID');
            $table->unsignedBigInteger('Consultant_ID');
            $table->timestamps();

            $table->foreign('Schedule_ID')->references('Schedule_ID')->on('schedules')->onDelete('cascade');
            $table->foreign('Consultant_ID')->references('Consultant_ID')->on('consultants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workschedules');
        Schema::dropIfExists('schedules');
    }
};
