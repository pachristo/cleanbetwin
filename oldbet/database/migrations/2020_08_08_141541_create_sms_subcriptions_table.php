<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsSubcriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_subcriptions', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('planName')->nullable();
            $table->string('nairaPrice')->nullable();
            $table->string('keshPrice')->nullable();
            $table->string('dollarPrice')->nullable();
            $table->string('cedPrice')->nullable();
            $table->string('ugxprice')->nullable();
            $table->string('tzsPrice')->nullable();
            $table->string('zarPrice')->nullable();
            $table->string('planBenefits')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('sms_subcriptions');
    }
}
