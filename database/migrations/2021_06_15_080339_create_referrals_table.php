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
            $table->unsignedInteger('direct_individual_id');
            $table->unsignedInteger('referral_source_id');
            $table->date('referral_date')->nullable();
            $table->string('referring_person_name');
            $table->string('referring_person_email');
            //$table->unsignedBigInteger('created_user_id');
            $table->timestamps();

            $table->foreign('direct_individual_id')->references('id')->on('individuals')->onDelete('cascade');
            $table->foreign('referral_source_id')->references('id')->on('referral_sources')->onDelete('cascade');
            //$table->foreign('created_user_id')->references('id')->on('users')->onDelete('cascade');  //do nothing on delete

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
