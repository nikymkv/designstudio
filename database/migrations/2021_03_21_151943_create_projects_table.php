<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_company', 256);
            $table->string('scope', 256);
            $table->datetime('date_created');
            $table->datetime('deadline')->nullable();
            $table->float('proposed_payment')->nullable();
            $table->float('price')->nullable();
            $table->unsignedBigInteger('current_employee_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('current_status_id')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->text('description')->nullable();
            $table->text('answers')->nullable();

            $table->engine = "InnoDB";

            $table->foreign('client_id')->references('id')->on('clients');  
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
