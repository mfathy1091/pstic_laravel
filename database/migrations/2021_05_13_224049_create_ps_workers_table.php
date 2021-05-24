<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_workers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('gender_id')->unsigned();
            $table->bigInteger('nationality_id')->unsigned();
            $table->bigInteger('area_id')->unsigned();
            $table->date('recruitment_date');
            $table->timestamps();

            // foreign keys
            $table->foreign('team_id')->references('id')->on('ps_teams')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_workers');
    }
}
