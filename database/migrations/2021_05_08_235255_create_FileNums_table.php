<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFileNumsTable extends Migration {

	public function up()
	{
		Schema::create('FileNums', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('filenum');
			$table->string('fileowner');
		});
	}

	public function down()
	{
		Schema::drop('FileNums');
	}
}