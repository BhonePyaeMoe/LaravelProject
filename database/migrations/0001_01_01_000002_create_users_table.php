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
        Schema::create('usertype', function (Blueprint $table) {
            $table->id('Type_ID'); // Primary Key
            $table->string('TypeName');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id('User_ID'); // Primary Key
            $table->string('User_Name');
            $table->string('User_Email')->unique();
            $table->string('User_Password');
            $table->integer('User_Age');
            $table->string('User_Phone');
            $table->unsignedBigInteger('Type_ID'); // Change to unsignedBigInteger

            $table->foreign('Type_ID')->references('Type_ID')->on('usertype')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('usertype');
    }
};