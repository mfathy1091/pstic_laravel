<?php

namespace App\Http\Controllers\Beneficiary;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Record;
use App\Models\PssCase;

use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{
    public function index()
    {
        $beneficiaries = Beneficiary::all();

        $julyCases = PssCase::whereHas('records', function($query){
            $query->where('month_id', '07');
        });

        $beneficiaries = Beneficiary::whereHas('record', function($q){
            return $q->where('month_id', '6');
        })->get();
        // })->orderBy('published_date', 'desc')->paginate(10);



        return view('beneficiaries.index', compact('beneficiaries'));
    }

    public function search(Request $request){
        if($request->ajax()){
            $data = Beneficiary::whereHas('record', function($q){
                return $q->where('month_id', '6');
            })->get();
            
            $output = '';
            if(count($data)>0){
                $output .= '
                    <div class="table-responsive">
                    <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
                        data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>                            
                                <th class="align-middle">Month</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Age</th>
                                <th class="align-middle">Gender</th>
                                <th class="align-middle">Nationality</th>
                                <th class="align-middle">Benefits</th>
                            </tr>
                        </thead>
                        <tbody>';
                            
                            foreach($data as $beneficiary){
                                $output .= '
                                    <tr>
                                        <td>'.$beneficiary->record->month->name.'</td>
                                        <td>
                                            '.$beneficiary->individual->name
                                ;
                                            if ($beneficiary->is_direct == '1'){
                                                $output .= '
                                                    <span class="badge badge-pill badge-secondary ml-4 font-weight-bold font-italic">Direct</span>
                                                ';
                                            }
                                        
                                        $output .= '
                                        </td>
                                        <td>'.$beneficiary->individual->age.'</td>
                                        <td>'.$beneficiary->individual->gender->name.'</td>
                                        <td>'.$beneficiary->individual->nationality->name.'</td>
                                        <td>
                                            <ul>
                                        ';
                                                foreach ($beneficiary->benefits as $benefit){
                                                $output .= '
                                                    <li>'.$benefit->service->name.'</li>
                                                ';
                                                }
                                $output .= '         
                                            </ul>    
                                        </td>
                                    </tr>
                                ';
                            }

                $output .= '      
                        </tbody>
                    </table>
                </div>
                ';
                







            }else{
                $output .='No results';
            }
            return $output;
        }
    }
}


