@extends('layouts.master')
@section('css')
@section('title')
PSS Case Detail
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
PSS Case Details:
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
    

            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">
                            {{ $referral->file->number }} <span class="text-muted ml-2 mr-2"></span> 
                        </h4>
                        <h5 class="text-primary">
                            {{ $referral->referralSource->name }} <span class="text-muted ml-2 mr-2">|</span> {{ $referral->referral_date }}
                            
                        </h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col mb-4">
                                <h6 class="card-subtitle mb-2 text-muted">Referral Source</h6>
                                <div class="ml-4">
                                    <li>{{ $referral->referralSource->name }}</li>
                                    <li>{{ $referral->referring_person_name }}</li>
                                    <li>{{ $referral->referring_person_email }}</li>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <h6 class="card-subtitle mb-2 text-muted">Reason of Referral</h6>
                                <div class="ml-4">
                                    <?php $reasons = $referral->reasons; ?>
                                    @foreach ($reasons as $reason)
                                        <li>{{ $reason->name }}</li>
                                    @endforeach
                                </div>
                            </div>

                            
                        </div>

                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-header">
                        <h5 class="text-primary">
                            PSS Case
                            <span class="text-muted ml-2 mr-2">|</span>
                            {{ $pssCase->directIndividual->name }},
                            {{ $pssCase->directIndividual->nationality->name }},
                            {{ $pssCase->directIndividual->gender->name }},
                            {{ $pssCase->directindividual->age }} yrs
                        </h5>

                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col mb-4">
                                <h6 class="card-subtitle mb-2 text-muted">Assigned PSW: {{ $pssCase->assignedPsw->name }}</h6>
                                <div class="ml-4">


                                </div>
                            </div>


                            
                        </div>

                        <h5>Beneficiaries</h5>
                        <div class="table-responsive">
                            <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50"
                                style="text-align: center">
                                <thead>
                                    <tr>                            
                                        <th class="align-middle">Name</th>
                                        <th class="align-middle">Age</th>
                                        <th class="align-middle">Gender</th>
                                        <th class="align-middle">Nationality</th>
                                        <th class="align-middle">Vulnerabilities</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($beneficiaries as $beneficiary)
                                        <tr>
                                            
                                            <td>
                                                {{ $beneficiary->individual->name }}
                                                @if ($beneficiary->is_direct === '1')
                                                    <span class="badge badge-pill badge-secondary ml-4 font-weight-bold font-italic">Direct</span>
                                                @endif
                                            </td>
                                            <td>{{ $beneficiary->individual->age }}</td>
                                            <td>{{ $beneficiary->individual->gender->name }}</td>
                                            <td>{{ $beneficiary->individual->nationality->name }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            




            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-md-left">
                            <div class="col-md-auto">
                                <h4 class="text-dark">Monthly Activities</h4>
                            </div>
                        </div>                        
                    </div>
                    <div class="card-body">
                        
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <?php $n = 0; ?>
                            @foreach ($records as $record)
                            <?php $n++; ?>
                                <li class="nav-item border border-secondary rounded" role="presentation">
                                    <a class="nav-link{{ $n == '1' ? ' active' : '' }}" id="pills-home-tab" data-toggle="tab" href="#{{ $record->id }}" 
                                        role="tab" aria-controls="{{ $record->id }}" 
                                        aria-selected="{{ $record->month->name == 'June' ? 'true' : 'false' }}">{{ $record->month->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        {{-- end tabs buttons--}}
        
                        {{-- tab contents --}}
                        <div class="tab-content" id="pills-tabContent">
                            <?php $n = 0; ?>
                            @foreach ($records as $record)
                                <?php $n++; ?>
                                <div class="tab-pane fade{{ $n == '1' ? ' show active' : '' }}" id="{{ $record->id }}" role="tabpanel" aria-labelledby="{{ $record }}-tab">
                                    <div class="col-md-auto">
                                        <span class="badge badge-pill badge-warning h-auto font-weight-bold font-italic">{{ $record->status->name }}</span>
                                        
                                        @if ($record->is_emergency == '1')
                                            <span class="text-muted ml-2 mr-2">|</span>
                                            <span class="badge badge-pill badge-danger h-auto font-weight-bold font-italic">Emergency</span>
                                        @endif
                                    </div>

                                    <br>
                                    <hr>

                                    {{-- visits --}}
                                    <div class="row">
                                        <div class="col-lg-12 margin-tb">
                                            <div class="pull-left">
                                                <h5>Visits</h2>
                                            </div>
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addVisitModal">
                                                    Add Visit
                                                </button>                                                 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            @if(!$record->visits->isEmpty())
        
                                            <div class="table-responsive">
                                                <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
                                                    data-page-length="50"
                                                    style="text-align: center">
                                                    <thead>
                                                        <tr>                            
                                                            <th class="align-left">Date</th>
                                                            <th class="align-left">Comment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($record->visits as $visit)
                                                            <tr>
                                                                <td>{{ $visit->date }}</td>
                                                                <td>{{ $visit->comment }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <div>This Month has no visits!</div>
                                        @endif
                                        </div>
                                        
                                    </div>

                                    <br>
                                            
                                    <hr>
                                    





                                    {{-- Services --}}
                                    <div class="row">
                                        <div class="col-lg-12 margin-tb">
                                            <div class="pull-left">
                                                <h5>Services</h2>
                                            </div>
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addServiceModal">
                                                    Add Service
                                                </button>                                      
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                            @if(!$record->benefits->isEmpty())

                                                <div class="table-responsive">
                                                    <table id="datatable1" class="table w-auto table-hover table-sm table-bordered p-0"
                                                        data-page-length="50"
                                                        style="text-align: center">
                                                        <thead>
                                                            <tr>                            
                                                                <th>Service</th>
                                                                <th>Individuals</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                                
                                                            @foreach($record->benefits as $benefit)
                                                                <tr>
                                                                    <td>
                                                                        {{ $benefit->service->name }}
                                                                    </td>
                                                                    <td>
                                                                        @foreach ($benefit->individuals as $individual)
                                                                                
                                                                                <div>{{ $individual->name }}</div>
                                                                        @endforeach
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <div>This Month has no services!</div>
                                            @endif

                                        </div>
                                        
                                    </div>

                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

</div>
<!-- row closed -->



<!-- ADD Visit MODAL -->
<div class="modal fade" id="addVisitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add Visit
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('visits.store') }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="visit_date">Visit Date</label>
                            <div class='input-group date'>
                                <input class="form-control" type="text"  id="datepicker-action" name="visit_date" data-date-format="dd-mm-yyyy" autocomplete="off" required>
                            </div>
                            @error('visit_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>             

                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea class="form-control" id="comment" rows="3"></textarea>
                    </div>


                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>

        </div>
    </div>
</div>


<!-- ADD Service MODAL -->
<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add Service
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('benefits.store') }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Service</label>
                            <select class="custom-select my-1 mr-sm-2" name="service_id">
                                <option selected>Select Service</option>
                                @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                            </select>
                            @error('service_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>                

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="beneficiaries" class="mr-sm-2">Beneficiaries:</label>
                            <div>
                                <select class="form-select" multiple aria-label="beneficiaries">
                                    @foreach ($beneficiaries as $beneficiary)
                                        <option>{{ $beneficiary->individual->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="provide_date">Provide Date</label>
                            <div class='input-group date'>
                                <input class="form-control" type="text"  id="datepicker-action" name="provide_date" data-date-format="dd-mm-yyyy" autocomplete="off" required>
                            </div>
                            @error('provide_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>  


                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>

        </div>
    </div>
</div>



@endsection
@section('js')

@endsection



