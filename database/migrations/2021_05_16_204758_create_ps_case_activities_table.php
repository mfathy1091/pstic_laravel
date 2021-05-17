<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsCaseActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_case_activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('case_id')->unsigned();
            $table->bigInteger('month_id')->unsigned();
            $table->bigInteger('case_status_id')->unsigned();
            $table->timestamps();

            // foreign keys
            $table->foreign('case_id')->references('id')->on('ps_cases')->onDelete('cascade');
            $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
            $table->foreign('case_status_id')->references('id')->on('case_statuses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_case_activities');
    }
}
