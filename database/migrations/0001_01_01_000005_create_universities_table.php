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
        // Schema::create('consultants', function (Blueprint $table) {
        //     $table->id('Consultant_ID'); // Primary Key
        //     $table->string('Consultant_Name');
        //     $table->string('Consultant_Email');
        //     $table->timestamps();
        // });

        // Schema::create('countries', function (Blueprint $table) {
        //     $table->id('Country_ID'); // Primary Key
        //     $table->string('Country_Name');
        //     $table->timestamps();
        // });

        // Schema::create('consultingcountries', function (Blueprint $table) {
        //     $table->id('Consultingcountry_ID'); // Primary Key
        //     $table->unsignedBigInteger('Consultant_ID');
        //     $table->unsignedBigInteger('Country_ID');
        //     $table->timestamps();

        //     $table->foreign('Consultant_ID')->references('Consultant_ID')->on('consultants')->onDelete('cascade');
        //     $table->foreign('Country_ID')->references('Country_ID')->on('countries')->onDelete('cascade');
        // });

        // Schema::create('universities', function (Blueprint $table) {
        //     $table->id('University_ID');
        //     $table->string('University_Name');
        //     $table->unsignedBigInteger('Country_ID');
        //     $table->timestamps();

        //     $table->foreign('Country_ID')->references('Country_ID')->on('countries')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('universities');
        // Schema::dropIfExists('consultingcountries');
        // Schema::dropIfExists('countries');
        // Schema::dropIfExists('consultants');
    }
};
