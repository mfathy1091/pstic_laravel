<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('record_id');
            $table->unsignedInteger('beneficiary_id');
            $table->timestamps();

            // foreign keys
            $table->foreign('record_id')->references('id')->on('records')->onDelete('cascade');
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
        Schema::dropIfExists('records_beneficiaries');
    }
}
