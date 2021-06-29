<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePssCaseBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pss_case_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('pss_case_id');
            $table->unsignedInteger('beneficiary_id');
            $table->boolean('is_direct');
            $table->timestamps();

            // foreign keys
            $table->foreign('pss_case_id')->references('id')->on('pss_cases')->onDelete('cascade');
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pss_case_beneficiaries');
    }
}
