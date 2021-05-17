<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();

            //$table->unsignedBigInteger('identy_card_id');
            $table->unsignedBigInteger('referral_source_id');
            $table->date('referral_date');
            $table->string('direct_beneficiary_name');
            $table->boolean('is_emergency');
            $table->string('ps_worker_id');

            $table->timestamps();

            $table->foreign('referral_source_id')->references('id')->on('referral_sources')->onDelete('cascade');
            $table->foreign('ps_worker_id')->references('id')->on('ps_workers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referrals');
    }
}
