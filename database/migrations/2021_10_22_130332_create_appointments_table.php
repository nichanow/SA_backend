<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignIdFor(\App\Models\User::class, 'sender_id');
            $table->foreignIdFor(\App\Models\User::class, 'receiver_id');

            $table->string('title');
            $table->longText('detail');
            $table->datetime('booking_date');
            $table->string('booking_time');
            $table->enum('status', ['Confirmed', 'Declined', 'Waiting'])->default('Waiting');
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
        Schema::dropIfExists('appointments');
    }
}
