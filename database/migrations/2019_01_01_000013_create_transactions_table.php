<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->integer('patient_id');
            $table->integer('service_id');
            $table->integer('claim_id');
            $table->integer('company_id');
            $table->string('cost');
            $table->enum('payment_status', ['pending', 'done', 'rejected'])->default('pending');
            $table->timestamps();
        });

//        Schema::table('claims', function (Blueprint $table) {
//            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
//        });
//
//        Schema::table('claims', function (Blueprint $table) {
//            $table->foreign('service_id')->references('id')->on('medical_services')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
