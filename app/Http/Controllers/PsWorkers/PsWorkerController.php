<?php

namespace App\Http\Controllers\PsWorkers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PsWorkerRepositoryInterface;

class PsWorkerController extends Controller
{
	private $repository;

	public function __construct(PsWorkerRepositoryInterface $repository)
	{
        $this->repository = $repository;
	}

	public function index()
	{
		$psWorkers = $this->repository->getAllPsWorkers();

		return view('pages.ps_workers.index', compact('psWorkers'));
	}


	public function show($id){
		$data = $this->repository->getPsWorker($id);
		//return view('psworkers.show')->with('data', $data);

	}


	public function create()
    {
		$genders = $this->repository->getAllGenders();
		$psTeams = $this->repository->getAllPsTeams();
		$nationalities = $this->repository->getAllNationalities();
		return view('pages.ps_workers.create',compact('genders','nationalities', 'psTeams'));
    }


	public function store(Request $request)
    {
		//dd($request);
		return $this->repository->storePsWorker($request);
    }

}