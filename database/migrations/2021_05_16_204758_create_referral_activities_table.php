<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('referral_id')->unsigned();
            $table->bigInteger('month_id')->unsigned();
            $table->bigInteger('case_status_id')->unsigned();
            $table->timestamps();

            // foreign keys
            $table->foreign('referral_id')->references('id')->on('referrals')->onDelete('cascade');
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
        Schema::dropIfExists('referral_activities');
    }
}
