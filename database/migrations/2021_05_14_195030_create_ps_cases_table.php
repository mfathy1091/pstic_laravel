<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_cases', function (Blueprint $table) {
            $table->id();

            //$table->unsignedBigInteger('identy_card_id');
            $table->string('file_number');
            $table->unsignedBigInteger('referral_source_id');
            $table->date('referral_date');
            $table->bigInteger('case_status_id')->unsigned();
            $table->string('direct_beneficiary_id');
            $table->boolean('is_emergency');
            $table->string('ps_worker_id');

            $table->timestamps();

            $table->foreign('referral_source_id')->references('id')->on('referral_sources')->onDelete('cascade');
            $table->foreign('ps_worker_id')->references('id')->on('ps_workers')->onDelete('cascade');
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
        Schema::dropIfExists('ps_cases');
    }
}
