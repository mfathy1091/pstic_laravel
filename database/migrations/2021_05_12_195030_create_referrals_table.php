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
            $table->string('referral_date');
            $table->string('direct_beneficiary_name');

            $table->timestamps();

            $table->index('referral_source_id');
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
