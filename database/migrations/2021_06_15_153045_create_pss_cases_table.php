<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePssCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pss_cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('direct_individual_id');
            $table->unsignedBigInteger('file_id');
            $table->unsignedBigInteger('referral_id');
            $table->unsignedBigInteger('current_status_id')->nullable();
            $table->unsignedBigInteger('assigned_psw_id');
            //$table->boolean('is_emergency');    /* first month only */
            $table->timestamps();

            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('direct_individual_id')->references('id')->on('individuals')->onDelete('cascade');
            $table->foreign('current_status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('assigned_psw_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pss_cases');
    }
}
