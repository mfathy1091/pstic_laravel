<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('individual_id');
            $table->unsignedInteger('pss_case_id');
            $table->unsignedInteger('record_id');
            $table->unsignedInteger('month_id');
            $table->boolean('is_direct');
            $table->timestamps();

            // foreign keys
            $table->foreign('individual_id')->references('id')->on('individuals')->onDelete('cascade');
            $table->foreign('record_id')->references('id')->on('records')->onDelete('cascade');
            $table->foreign('pss_case_id')->references('id')->on('pss_cases')->onDelete('cascade');
            $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiaries');
    }
}
