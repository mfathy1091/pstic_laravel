<?php

namespace App\Http\Controllers\PsWorkers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PsWorkerRepositoryInterface;
use App\Models\PsWorker;
use App\Models\Area;


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
		$areas = Area::all();

		return view('pages.ps_workers.index', compact('psWorkers', 'areas'));
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
		$areas = Area::all();
		return view('pages.ps_workers.create',compact('genders','nationalities', 'psTeams', 'areas'));
    }


	public function store(Request $request)
    {
		//dd($request);
		return $this->repository->storePsWorker($request);
    }

	    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        PsWorker::findOrFail($request->id)->delete();
        return redirect()->route('psworkers.index');
    }

}