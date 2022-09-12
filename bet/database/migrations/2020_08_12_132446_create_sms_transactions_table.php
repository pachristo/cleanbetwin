<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transactionRef')->nullable(); 
            $table->string('transactionID')->nullable();
            $table->string('transactionType')->nullable();
            $table->integer('userID')->default('0');
            $table->integer('planID')->default('0');
            $table->dateTime('subDate')->nullable();
            $table->string('statusCode')->nullable();
            $table->string('amountPaid')->nullable();
            $table->string('ipAddress')->nullable();
            $table->string('authCode')->nullable();
            $table->integer('status')->default('0');
            $table->integer('other')->default('0');
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
        Schema::dropIfExists('sms_transactions');
    }
}
