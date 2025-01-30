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
        Schema::create('users', function (Blueprint $table) {
            $table->id('User_ID'); // Primary Key
            $table->string('User_Name');
            $table->string('User_Email')->unique();
            $table->integer('User_Age');
            $table->string('User_Phone');
            $table->timestamps();
        });

        Schema::create('user_types', function (Blueprint $table) {
            $table->id('UserType_ID'); // Primary Key
            $table->unsignedBigInteger('User_ID'); // Foreign Key
            $table->string('TypeName');
            $table->timestamps();

            $table->foreign('User_ID')->references('User_ID')->on('users')->onDelete('cascade'); // Foreign Key Constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_types');
        Schema::dropIfExists('users');
    }
};
