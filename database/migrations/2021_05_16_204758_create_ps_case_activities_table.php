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
            $table->unsignedBigInteger('month_id');
            $table->unsignedBigInteger('pss_status_id');
            $table->unsignedBigInteger('ps_case_id');
            $table->timestamps();

            // foreign keys
            $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
            $table->foreign('pss_status_id')->references('id')->on('pss_statuses')->onDelete('cascade');
            $table->foreign('ps_case_id')->references('id')->on('ps_cases')->onDelete('cascade');

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
