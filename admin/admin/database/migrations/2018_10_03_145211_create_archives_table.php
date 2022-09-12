<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creator');
            $table->string('gameDate');
            $table->string('gameTime');
            $table->string('teamOne');
            $table->string('teamOneForm')->nullable();
            $table->string('teamOneOdds');
            $table->string('teamTwo');
            $table->string('teamTwoForm')->nullable();
            $table->string('teamTwoOdds');
            $table->string('drawOdd');
            $table->string('league');
            $table->string('freePick')->nullable();
            $table->string('upcomingGame')->nullable();
            $table->string('FTRecommendation')->nullable();

            $table->string('oneFiveGoals')->nullable();
            $table->string('doubleChance')->nullable();
            $table->string('twoFiveGoals')->nullable();
            $table->string('BTTS')->nullable();
            $table->string('draws')->nullable();
            $table->string('drawNoBet')->nullable();
            $table->string('winEitherHalf')->nullable();
            $table->string('singleBets')->nullable();
            $table->string('weekendTips')->nullable();

            $table->string('bankerOfTheDay')->nullable();
            $table->string('bankerOfTheDayTip')->nullable();
            $table->string('bankerOfTheDayOdds')->nullable();

            $table->json('likes')->nullable();
            $table->json('dislikes')->nullable();

            $table->boolean('testimonial')->nullable();
            $table->string('testimonialValue')->nullable();
            $table->integer('cornerStatus')->default('0');
            $table->string('cornerResult')->nullable();
            $table->integer('teamOneScore')->nullable();
            $table->integer('teamTwoScore')->nullable();
            $table->string('teamOneWon')->nullable();
            $table->string('teamTwoWon')->nullable();

            $table->boolean('status')->default('0');
            $table->boolean('display')->default('0');
            $table->boolean('other')->default('0');
            $table->boolean('gameType')->default('0');
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
        Schema::dropIfExists('archives');
    }
}
