<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionOneResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_one_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('survey_participant_id');
            $table->unsignedBigInteger('days_active');
            $table->unsignedBigInteger('mins_active');
            $table->string('activities');
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
        Schema::dropIfExists('section_one_responses');
    }
}
