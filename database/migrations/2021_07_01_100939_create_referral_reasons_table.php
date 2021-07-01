<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_reasons', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('referral_id');
            $table->unsignedInteger('reason_id');
            $table->timestamps();



            $table->foreign('referral_id')->references('id')->on('referrals')->onDelete('cascade');
            $table->foreign('reason_id')->references('id')->on('reasons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral_reasons');
    }
}
