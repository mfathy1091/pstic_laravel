@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    PS Cases
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
PS Cases
@stop
<!-- breadcrumb -->
@endsection



@section('content')
    {{-- tabs --}}
    <ul class="nav nav-pills" id="pills-tab" role="tablist">
        <?php $n = 0; ?>
        @foreach ($tabs as $tab)
        <?php $n++; ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link{{ $n == '1' ? ' active' : '' }}" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#{{ $tab['name'] }}" type="button" role="tab" aria-controls="{{ $tab['name'] }}" aria-selected="{{ $tab['name'] == 'New' ? 'true' : 'false' }}">{{ $tab['name'] }}</button>
            </li>
        @endforeach
    </ul>

{{-- tab contents --}}

<div class="tab-content" id="pills-tabContent">
    <?php $n = 0; ?>
    @foreach ($tabs as $tab)
    <?php $n++; ?>
        <div class="tab-pane fade{{ $n == '1' ? ' show active' : '' }}" id="{{ $tab['name'] }}" role="tabpanel" aria-labelledby="{{ $tab['name'] }}-tab">
        
            <!-- row -->
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
                            {{-- add button --}}
                            <a href="{{route('pscases.create')}}" class="btn btn-success btn-sm" role="button"
                            aria-pressed="true">Add PS Case</a><br><br>
                            <br><br>




   
                                                                            <!-- table -->
                                                                            <div class="table-responsive">
                                                                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                                                                    data-page-length="50"
                                                                                    style="text-align: center">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>#</th>
                                                                                            <th>Current Status</th>
                                                                                            <th>Referral Date</th>
                                                                                            <th>File Number</th>
                                                                                            <th>Referral Source</th>
                                                                                            <th>Referring Person Name</th>
                                                                                            <th>Referring Person Email</th>
                                                                                            <th>Case Type</th>
                                                                                            <th>Emergency</th>
                                                                                            <th>Assigned PSW</th>
                                                                                            <th>Direct Beneficiary Name</th>
                                                                                            <th>Age</th>
                                                                                            <th>Gender</th>
                                                                                            <th>Nationality</th>
                                                                                            <th>Activities</th>
                                                                                            <th>Visits</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php $i = 0; ?>
                                                                                        @foreach ($tab['cases'] as $psCase)
                                                                                            <tr>
                                                                                                <?php $i++; ?>
                                                                                                <td>{{ $i }}</td>
                                                                                                <td>{{ $psCase->caseStatus->name }}</td>
                                                                                                <td>{{ $psCase->referral_date }}</td>
                                                                                                <td>{{ $psCase->file_number }}</td>
                                                                                                <td>{{ $psCase->referralSource->name }}</td>
                                                                                                <td>{{ $psCase->referring_person_name }}</td>
                                                                                                <td>{{ $psCase->referring_person_email }}</td>
                                                                                                <td>{{ $psCase->caseType->name }}</td>                                              
                                                                                                <td>{{ $psCase->is_emergency }}</td>
                                                                                                <td>{{ $psCase->psWorker->name }}</td>
                                                                                                <td>{{ $psCase->directBeneficiary->name }}</td>
                                                                                                <td>{{ $psCase->directBeneficiary->age }}</td>
                                                                                                <td>{{ $psCase->directBeneficiary->gender->name }}</td>
                                                                                                <td>{{ $psCase->directBeneficiary->nationality->name }}</td>

                                                                                                <td>
                                                                                                    @php
                                                                                                        $psCaseActivities = $psCase->psCaseActivities
                                                                                                    @endphp
                                                                                                    
                                                                                                    @foreach ( $psCaseActivities as $psCaseActivity)
                                                                                                    <div>{{ $psCaseActivity->month->name }}, {{$psCaseActivity->caseStatus->name  }}</div>
                                                                                                    
                                                                                                    @endforeach
                                                                                                </td>

                                                                                                <td>
                                                                                                    @php
                                                                                                        $visits = $psCase->visits
                                                                                                    @endphp
                                                                                                    
                                                                                                    @foreach ( $visits as $visit)
                                                                                                    <div>{{ $visit->date }}</div>
                                                                                                    
                                                                                                    @endforeach
                                                                                                </td>

                                                                                                <td>
                                                                                                    <a href="{{route('pscases.edit',$psCase->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_ps_case{{ $psCase->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <div class="modal fade" id="delete_ps_case{{$psCase->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog" role="document">
                                                                                                    <form action="{{route('pscases.destroy','test')}}" method="post">
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
                                                                            <!-- end table -->
                                    
                        </div>
                    </div> 
                    
                    
                </div>
            </div>
            <!-- row closed -->
        
        </div>
    @endforeach
</div>



@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@endsection
