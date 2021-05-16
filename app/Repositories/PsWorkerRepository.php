<?php namespace App\Repositories;

use App\Models\PsWorker;
use App\Repositories\PsWrokerRepositoryInterface;

class PsWorkerRepository implements PsWrokerRepositoryInterface
{
	public function getAll(){
		return PsWorker::all();
	}

	public function getPsWorker($id){
		return PsWorker::findOrFail($id);
	}

}