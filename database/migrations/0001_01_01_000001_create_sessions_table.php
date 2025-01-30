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
            $table->string('id')->primary(); // The session ID will be the primary key
            $table->unsignedBigInteger('user_id')->nullable(); // User ID if available
            $table->string('ip_address', 45)->nullable(); // To store the IP address (IPv4 + IPv6)
            $table->text('user_agent')->nullable(); // To store the user agent
            $table->longText('payload'); // To store session data (serialized)
            $table->integer('last_activity'); // Timestamp of the last activity
            
            $table->index('user_id'); // Optional: Create an index on the user_id column
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
