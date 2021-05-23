<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->string('project_name')->nullable();
            $table->string('user_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('mobile')->nullable();
            $table->string('team_name')->nullable();
            $table->string('number_of_person')->nullable();
            $table->string('visit_date')->nullable();
            $table->string('staff_pickup_place')->nullable();
            $table->string('client_pickup_place')->nullable();
            $table->string('starting_time')->nullable();
            $table->string('back_time')->nullable();
   
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
        Schema::dropIfExists('requisitions');
    }
}
