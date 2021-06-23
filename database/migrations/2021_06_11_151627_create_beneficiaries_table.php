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
            $table->unsignedbigInteger('file_id');
            $table->string('individual_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('name');
            $table->integer('age');
            $table->unsignedbigInteger('gender_id');
            $table->unsignedbigInteger('nationality_id');
            $table->unsignedbigInteger('relation_to_pa')->nullable();
            $table->timestamps();

            // foreign keys
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreign('relation_to_pa')->references('id')->on('relationships')->onDelete('cascade');
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
