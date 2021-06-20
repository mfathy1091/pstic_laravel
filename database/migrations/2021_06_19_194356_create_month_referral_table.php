<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthReferralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('month_referral', function (Blueprint $table) {
            $table->foreignId('month_id')->constrained();
            $table->foreignId('referral_id')->constrained();
            $table->string('case_status');

            $table->timestamps();

            // foreign keys
            //$table->foreign('case_status_id')->references('id')->on('case_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('month_referral');
    }
}
