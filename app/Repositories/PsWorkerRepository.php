<?php namespace App\Repositories;

use Exception;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\PsTeam;

use App\Models\PsWorker;
use Illuminate\Support\Facades\Hash;


class PsWorkerRepository implements PsWorkerRepositoryInterface
{
	public function getAllPsWorkers(){
		return PsWorker::all();
	}

	public function getPsWorker($id){
		return PsWorker::findOrFail($id);
	}

	public function getAllGenders()
	{
		return Gender::all();
	}

	public function getAllNationalities()
	{
		return Nationality::all();
	}

	public function getAllPsTeams()
	{
		return PsTeam::all();
	}


	public function storePsWorker($request)
	{
		try {
            $psWorker = new PsWorker();
            $psWorker->email = $request->email;
            $psWorker->password =  Hash::make($request->password);
            $psWorker->name = $request->name;
			$psWorker->team_id = $request->team_id;
			$psWorker->area_id = $request->area_id;
            $psWorker->gender_id = $request->gender_id;
            $psWorker->nationality_id = $request->nationality_id;
            $psWorker->recruitment_date = $request->recruitment_date;
            $psWorker->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('psworkers.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

	}
}

