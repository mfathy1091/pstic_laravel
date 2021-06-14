@extends('layouts.master')
@section('css')

@section('title')
Case Details
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Case Details:
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
    
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                

                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">
                            {{ $psCase->file_number }} <span class="text-muted ml-2 mr-2">|</span> 
                            {{ $psCase->directBeneficiary->name }} 
                            <span class="badge badge-pill badge-primary ml-3">{{ $psCase->caseStatus->name }}</span>
                        </h4>
                        <h5 class="text-primary">
                            {{ $psCase->referralSource->name }} <span class="text-muted ml-2 mr-2">|</span> {{ $psCase->referral_date }}
                            
                        </h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col mb-4">
                                <h6 class="card-subtitle mb-2 text-muted">Referral Source</h6>
                                <div class="ml-4">
                                    <li>{{ $psCase->referralSource->name }}</li>
                                    <li>{{ $psCase->referring_person_name }}</li>
                                    <li>{{ $psCase->referring_person_email }}</li>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <h6 class="card-subtitle mb-2 text-muted">Reason of Referral</h6>
                                <div class="ml-4">
                                    <li>MH</li>
                                    <li>Housing</li>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <h6 class="card-subtitle mb-2 text-muted">Provided Services</h6>
                                <div class="ml-4">
                                    <li></li>
                                    <li></li>
                                </div>
                            </div>
                            


                        </div>



                    </div>
                </div>

                <!-- beneficiaries -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5>Beneficiaries</h5>
                        <div class="table-responsive">
                            <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50"
                                style="text-align: center">
                                <thead>
                                    <tr>
                                        <th class="align-middle">#</th>
                        
                                        <th class="align-middle">Name</th>
                                        <th class="align-middle">Age</th>
                                        <th class="align-middle">Gender</th>
                                        <th class="align-middle">Nationality</th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td> 
                                        <td>{{ $psCase->directBeneficiary->name }}<span class=" text-info font-italic ml-4">Direct</span></td>
                                        <td>{{ $psCase->directBeneficiary->age }}</td>
                                        <td>{{ $psCase->directBeneficiary->gender->name }}</td>
                                        <td>{{ $psCase->directBeneficiary->nationality->name }}</td>
                                        <td>
                                            <a href="{{route('pscases.allcases.show',$psCase->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Show</a>
                    
                                            <a href="{{route('pscases.allcases.edit',$psCase->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_ps_case{{ $psCase->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php $i = 1; ?>
                                    <?php $indirectBeneficiaries = $psCase->beneficiariesIndirect; ?>
                                    @foreach ($indirectBeneficiaries as $indirectBeneficiary)
                                        <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td> 
                                            <td>{{ $indirectBeneficiary->name }}<span class="text-muted font-italic ml-4">Indirect</span></td>
                                            <td>{{ $indirectBeneficiary->age }}</td>
                                            <td>{{ $indirectBeneficiary->gender->name }}</td>
                                            <td>{{ $indirectBeneficiary->nationality->name }}</td>
                        
                                            <td>
                                                <a href="{{route('pscases.allcases.show',$psCase->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Show</a>
                        
                                                <a href="{{route('pscases.allcases.edit',$psCase->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_ps_case{{ $psCase->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                        
                                        <div class="modal fade" id="delete_ps_case{{$psCase->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{route('pscases.allcases.destroy','test')}}" method="post">
                                                    {{method_field('delete')}}
                                                    {{csrf_field()}}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>'Are You Sure?'</p>
                                                        <input type="hidden" name="id"  value="{{$psCase->id}}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- visits -->
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-auto">
                                <h5>Visits</h5>
                            </div>
                            <div class="col-md-auto">
                                <a href="{{route('visits.create')}}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">Add Visit</a>
                            </div>

                        </div>
                        
                        <?php $visits = $psCase->visits; ?>
                        @if($visits->isEmpty())
                            N/A
                        @else

                            <div class="table-responsive">
                                <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50"
                                    style="text-align: center">
                                    <thead >
                                        <tr>
                                            <th class="align-middle">#</th>
                            
                                            <th class="align-middle">Date</th>
                                            <th class="align-middle">Comment</th>
                                            <th class="align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        
                                        @foreach ($visits as $visit)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td> 
                                                <td>{{ $visit->date }}</td>
                                                <td>{{ $visit->comment }}</td>
                            
                                                <td>
                                                    <a href="{{route('pscases.allcases.show',$psCase->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Show</a>
                            
                                                    <a href="{{route('pscases.allcases.edit',$psCase->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_ps_case{{ $psCase->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                            
                                            <div class="modal fade" id="delete_ps_case{{$psCase->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('pscases.allcases.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>'Are You Sure?'</p>
                                                            <input type="hidden" name="id"  value="{{$psCase->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>


                
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection



