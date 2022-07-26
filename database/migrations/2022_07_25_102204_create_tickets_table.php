<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');

            // Create the foreign key
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('member_id');

            // Create the foreign key
            $table->foreign('member_id')->references('id')->on('team_members');

            $table->enum('status', ['open', 'closed', 'pending']);

            $table->string('subject');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}