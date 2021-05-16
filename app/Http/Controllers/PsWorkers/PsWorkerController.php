<?php

namespace App\Http\Controllers\PsWorkers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PostRepositoryInterface;

class PsWorkerController extends Controller
{
	private $repository;

	public function __construct(PostRepositoryInterface $repository)
	{
        $this->repository = $repository;
	}

	public function index(){
		$data = $this->repository->getAll();
		return view('psworkers.index')->with('data', $data);
	}

	public function show($id){
		$data = $this->repository->getPsWorker($id);
		return view('psworkers.show')->with('data', $data);
	}
}