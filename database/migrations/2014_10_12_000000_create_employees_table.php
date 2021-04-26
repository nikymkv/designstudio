<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->date('dob');
            $table->string('phone', 15);
            $table->unsignedBigInteger('payment_type_id');
            $table->float('hourly_payment')->default(0.00);
            $table->boolean('is_admin')->default(FALSE);
            $table->date('hired')->default(now());
            $table->date('dismissed')->nullable();
            $table->string('password');
            $table->timestamps();

            $table->engine = "InnoDB";

            $table->foreign('payment_type_id')->references('id')->on('payment_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
