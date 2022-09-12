<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVipsToPredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('predictions', function (Blueprint $table) {
            $table->string('sure2Odds')->nullable();
            $table->string('sure2OddsTip')->nullable();
            $table->string('sure2OddsOdds')->nullable();

            $table->string('sure3Odds')->nullable();
            $table->string('sure3OddsTip')->nullable();
            $table->string('sure3OddsOdds')->nullable();

            $table->string('overThree')->nullable();
            $table->string('overThreeOdds')->nullable();

            $table->string('HTFT')->nullable();
            $table->string('HTFTOdds')->nullable();

            $table->string('btts_gg')->nullable();
            $table->string('bttsTip')->nullable();
            $table->string('bttsOdds')->nullable();

            $table->string('draws')->nullable();
            $table->string('drawsTip')->nullable();
            $table->string('drawsOdds')->nullable();

            $table->string('sure5Odds')->nullable();
            $table->string('sure5OddsTip')->nullable();
            $table->string('sure5OddsOdds')->nullable();

            $table->string('singleBets')->nullable();
            $table->string('singleBetsTip')->nullable();
            $table->string('singleBetsOdds')->nullable();

            $table->string('weekendTips')->nullable();
            $table->string('weekendTipsTip')->nullable();
            $table->string('weekendTipsOdds')->nullable();

            $table->string('matchCorners')->nullable();
            $table->string('matchCornersTip')->nullable();
            $table->string('matchCornersOdds')->nullable();

            $table->string('correctScore')->nullable();
            $table->string('correctScoreTip')->nullable();
            $table->string('correctScoreOdds')->nullable();

            $table->string('acca')->nullable();
            $table->string('accaTip')->nullable();
            $table->string('accaOdds')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('predictions', function (Blueprint $table) {
            //
        });
    }
}
