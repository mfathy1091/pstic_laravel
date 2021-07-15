<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('job_title_id');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('team_id')->nullable();
            $table->decimal('salary')->nullable();
            $table->unsignedInteger('budget_id');
            $table->date('hire_date');
            $table->unsignedInteger('user_id')->nullable();
            $table->boolean('is_supervisor')->nullable();


            $table->unsignedInteger('age');
            $table->unsignedInteger('gender_id');
            $table->unsignedInteger('nationality_id');

            $table->timestamps();

            // foreign keys
            $table->foreign('job_title_id')->references('id')->on('job_titles')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('budget_id')->references('id')->on('budgets')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
