<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_messages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ticket_id');

            // Create the foreign key
            $table->foreign('ticket_id')->references('id')->on('tickets');

            $table->unsignedBigInteger('user_id');

            // Create the foreign key
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('member_id');

            // Create the foreign key
            $table->foreign('member_id')->references('id')->on('team_members');

            $table->string('message');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_messages');
    }
}