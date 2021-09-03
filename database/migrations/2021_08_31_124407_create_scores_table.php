<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('survey_participant_id');
            $table->unsignedBigInteger('section_1_scores');            
            $table->unsignedBigInteger('section_2_scores');
            $table->unsignedBigInteger('section_3_scores'); 
            $table->unsignedBigInteger('section_4_scores'); 
            $table->unsignedBigInteger('section_5_scores');
            $table->unsignedBigInteger('total_scores');      
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
        Schema::dropIfExists('scores');
    }
}
