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
            $table->string('individual_id')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('name');
            $table->string('native_name');
            $table->integer('age');
            $table->unsignedbigInteger('gender_id');
            $table->unsignedbigInteger('nationality_id');
            $table->unsignedbigInteger('relationship_id')->nullable();
            $table->string('current_phone_number')->nullable();
            $table->timestamps();

            // foreign keys
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreign('relationship_id')->references('id')->on('relationships')->onDelete('cascade');
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
