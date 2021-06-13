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
            $table->date('referral_date');
            $table->string('file_number');
            $table->unsignedBigInteger('referral_source_id');
            $table->string('referring_person_name');
            $table->string('referring_person_email');
            $table->unsignedBigInteger('case_type_id');
            $table->unsignedBigInteger('case_status_id');
            $table->boolean('is_emergency');    /* first month only */
            $table->unsignedBigInteger('created_user_id');
            $table->unsignedBigInteger('assigned_employee_id');
            $table->timestamps();

            $table->foreign('referral_source_id')->references('id')->on('referral_sources')->onDelete('cascade');
            $table->foreign('case_type_id')->references('id')->on('case_types')->onDelete('cascade');
            $table->foreign('case_status_id')->references('id')->on('case_statuses')->onDelete('cascade');
            $table->foreign('created_user_id')->references('id')->on('users')->onDelete('cascade');  //do nothing on delete
            $table->foreign('assigned_employee_id')->references('id')->on('employees')->onDelete('cascade');

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
