<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('meeting_type_id')->nullable();
            $table->time('meeting_time')->nullable();
            $table->string('meeting_address')->nullable();
            $table->integer('visit_type_id')->nullable();
            $table->integer('client_status_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->date('date')->nullable();
            $table->longText('details')->nullable();
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
        Schema::dropIfExists('meetings');
    }
}
