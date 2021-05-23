<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('mobile_one')->nullable();
            $table->string('mobile_two')->nullable();
            $table->longText('address')->nullable();
            $table->longText('office_address')->nullable();
            $table->integer('profession_id');
            $table->string('company')->nullable();
            $table->string('designation')->nullable();
            $table->string('email')->nullable();
            $table->integer('source_id')->nullable();
            $table->string('project_id')->nullable();
            $table->integer('plot_id')->nullable();
            $table->string('budget')->nullable();
            $table->integer('client_status_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('team_id')->nullable();
            $table->longText('discussion_details')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
