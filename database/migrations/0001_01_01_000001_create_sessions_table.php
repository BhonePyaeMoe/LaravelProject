<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            // The session ID will be the primary key
            $table->string('id')->primary();
            // User ID if available
            $table->unsignedBigInteger('user_id')->nullable();
            // To store the IP address (IPv4 + IPv6)
            $table->string('ip_address', 45)->nullable();
            // To store the user agent
            $table->text('user_agent')->nullable();
            // To store session data (serialized)
            $table->longText('payload');
            // Timestamp of the last activity
            $table->integer('last_activity');
            
            // Optional: Create an index on the user_id column
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
