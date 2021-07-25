<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitsBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefits_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('benefit_id');
            $table->unsignedInteger('beneficiary_id');
            $table->timestamps();

            // foreign keys
            $table->foreign('benefit_id')->references('id')->on('benefits')->onDelete('cascade');
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
        Schema::dropIfExists('benefits_beneficiaries');
    }
}
