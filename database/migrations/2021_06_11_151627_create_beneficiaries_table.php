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
            $table->unsignedbigInteger('pss_case_id');
            $table->string('name');
            $table->integer('age');
            $table->unsignedbigInteger('gender_id');
            $table->unsignedbigInteger('nationality_id');
            $table->unsignedbigInteger('beneficiary_type_id');
            $table->timestamps();

            // foreign keys
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreign('pss_case_id')->references('id')->on('pss_cases')->onDelete('cascade');
            $table->foreign('beneficiary_type_id')->references('id')->on('beneficiary_types')->onDelete('cascade');
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
