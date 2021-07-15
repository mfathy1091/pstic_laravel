@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
All PSS Cases
@stop
@endsection
@section('page-header')
<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css" >
<!-- breadcrumb -->
@section('PageTitle')
All PSS Cases
@stop
<!-- breadcrumb -->
@endsection



@section('content')

<div class="row">

    @if ($errors->any())
        <div class="error">{{ $errors->first('Name') }}</div>
    @endif

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                <!-- Filter -->
                <form action="{{route('search.index')}}" method="get">
                    @csrf
                    <div class="form-group">
                        <select name="current_status_id" id="someid" class="form-control input-lgdynamic" data-dependent="state">
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>

                        
                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-left" type="submit">Submit</button>
                    
                </form>
                <!--End Filter -->
                <br>
                <br>
                <!-- table-->
                <div class="table-responsive">
                    <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
                        data-page-length="50"
                        style="text-align: center">
                        <thead >
                            <tr>
                                <th></th>
                                <th class="align-middle">#</th>
                                <th class="align-middle">File Number</th>
                                <th class="align-middle">Status (Current Month)</th>
                                <th class="align-middle">Referral Date</th>
                                <th class="align-middle">Referral Source</th>
                
                                <th class="align-middle">Direct Beneficiary Name</th>
                                <th class="align-middle">Age</th>
                                <th class="align-middle">Gender</th>
                                <th class="align-middle">Nationality</th>
                                <th class="align-middle">Assigned PSW</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($pssCases as $pssCase)
                            <tr data-toggle="collapse" data-target="#{{ $pssCase->id }}" class="accordion-toggle">
                                <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $pssCase->file->number }}</td>
                                    <td>{{ $pssCase->currentStatus->name }}</td>
                                    <td>{{ $pssCase->referral->referral_date }}</td>
                                    <td>{{ $pssCase->referral->referralSource->name }}</td>
                                    
                                    <td>{{ $pssCase->directIndividual->name }}</td>
                                    <td>{{ $pssCase->directIndividual->age }}</td>
                                    <td>{{ $pssCase->directIndividual->gender->name }}</td>
                                    <td>{{ $pssCase->directIndividual->nationality->name }}</td>
                
                                    <td>{{ $pssCase->assignedPsw->name }}</td>
                
                                    <td>
                                        <a href="{{route('psscases.show',$pssCase->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Show</a>
                
                                        <a href="{{route('psscases.edit',$pssCase->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_pss_case{{ $pssCase->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="12" class="hiddenRow">
                                        <div class="accordian-body collapse" id="{{ $pssCase->id }}"> 
                                            
                                            <table class="table">
                                                <tbody>
                                                    <?php $monthlyRecords = $pssCase->monthlyRecords ?>
                                                    @foreach ($monthlyRecords as $monthlyRecord)
                                                    <tr>
                                                        <td>{{ $monthlyRecord->month->name }}</td>
                                                        <td>
                                                            <div class="col-md-auto">
                                                                <span class="badge badge-pill badge-warning h-auto font-weight-bold font-italic pull-left">{{ $monthlyRecord->status->name }}</span>
                                                                
                                                                @if ($monthlyRecord->is_emergency == '1')
                                                                    <span class="text-muted ml-2 mr-2 pull-left">|</span>
                                                                    <span class="badge badge-pill badge-danger h-auto font-weight-bold font-italic pull-left">Emergency</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>    
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                
                
                
                                <div class="modal fade" id="delete_pss_case{{$pssCase->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('psscases.destroy',$pssCase->id)}}" method="post">
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
                                                <input type="hidden" name="id"  value="{{$pssCase->id}}">
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
                <!-- end table -->
                    
                    
            </div>
        </div>
            
        
    </div>
</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@endsection


