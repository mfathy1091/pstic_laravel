<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('referral_id');
            $table->unsignedInteger('section_id');
            $table->unsignedInteger('assigned_worker_id');
            $table->unsignedInteger('direct_beneficiary_id');
            $table->unsignedInteger('current_status_id')->nullable();
            $table->timestamps();

            // foreign keys
            $table->foreign('referral_id')->references('id')->on('referrals')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('assigned_worker_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('direct_beneficiary_id')->references('id')->on('beneficiaries')->onDelete('cascade');
            $table->foreign('current_status_id')->references('id')->on('statuses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral_sections');
    }
}
