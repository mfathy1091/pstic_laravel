<?php

namespace App\Http\Controllers\PsWorkers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PsWorkerRepositoryInterface;
use App\Models\PsWorker;

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

	    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
        //dd($request);

        $psWorker = PsWorker::find($id);
        $psWorker->name = $request->name;
        $psWorker->save();

        return redirect()->route('psworkers.index');
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