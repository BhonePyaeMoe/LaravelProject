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
        Schema::create('dates', function (Blueprint $table) {
            $table->id('Date_ID');
            $table->date('Date');
            $table->string('Day');
            $table->timestamps();
        });

        Schema::create('workdates', function (Blueprint $table) {
            $table->id('Workdate_ID');
            $table->unsignedBigInteger('Consultant_ID');
            $table->unsignedBigInteger('Date_ID');
            $table->timestamps();

            $table->foreign('Consultant_ID')->references('Consultant_ID')->on('consultants')->onDelete('cascade');
            $table->foreign('Date_ID')->references('Date_ID')->on('dates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workdates');
        Schema::dropIfExists('dates');
    }
};
