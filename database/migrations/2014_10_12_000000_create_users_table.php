<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('status')->default(0);

            $table->unsignedInteger('job_title_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('team_id')->nullable();
            $table->unsignedInteger('budget_id')->nullable();

            $table->decimal('salary')->nullable();
            $table->date('hire_date')->nullable();
            $table->boolean('is_supervisor')->nullable();

            $table->unsignedInteger('age')->nullable();
            $table->unsignedInteger('gender_id')->nullable();
            $table->unsignedInteger('nationality_id')->nullable();

            $table->timestamps();

            // foreign keys
            $table->foreign('job_title_id')->references('id')->on('job_titles')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('budget_id')->references('id')->on('budgets')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
