<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_visits', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('user_id')->nullable();
            $table->integer('project_type_id');
            $table->time('visit_time');
            $table->integer('vehicle_type_id');
            $table->string('no_of_client');
            $table->string('pick_up_place');
            $table->string('staff_up_place')->nullable();
            $table->integer('visit_type_id');
            $table->date('date');
            $table->integer('client_status_id');
            $table->longText('details');
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
        Schema::dropIfExists('project_visits');
    }
}
