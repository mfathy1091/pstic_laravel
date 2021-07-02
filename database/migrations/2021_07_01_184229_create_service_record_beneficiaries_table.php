<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRecordBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_record_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('service_record_id');
            $table->unsignedInteger('individual_id');
            $table->timestamps();

            // foreign keys
            $table->foreign('service_record_id')->references('id')->on('service_records')->onDelete('cascade');
            $table->foreign('individual_id')->references('id')->on('individuals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_record_beneficiaries');
    }
}
