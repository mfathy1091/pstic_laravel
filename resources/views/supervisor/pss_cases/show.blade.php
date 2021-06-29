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
                                    <li>MH</li>
                                    <li>Housing</li>
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
                            {{ $pssCase->directBeneficiary->name }},
                            {{ $pssCase->directBeneficiary->nationality->name }},
                            {{ $pssCase->directBeneficiary->gender->name }},
                            {{ $pssCase->directBeneficiary->age }} yrs
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
                                                {{ $beneficiary->beneficiary->name }}
                                                @if ($beneficiary->is_direct === '1')
                                                    <span class="badge badge-pill badge-info ml-4">direct</span>
                                                @endif
                                            </td>
                                            <td>{{ $beneficiary->beneficiary->age }}</td>
                                            <td>{{ $beneficiary->beneficiary->gender->name }}</td>
                                            <td>{{ $beneficiary->beneficiary->nationality->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <br>



            @foreach ($monthlyRecords as $monthlyRecord)
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-md-left">
                                <div class="col-md-auto">
                                    <h4 class="text-dark">
                                        {{ $monthlyRecord->month->name }}
                                    </h4>
                                </div>
                                <div class="col-md-auto">
                                    <span class="badge badge-pill badge-primary h-auto">{{ $monthlyRecord->pssStatus->name }}</span>
                                    
                                    @if ($monthlyRecord->is_emergency == '1')
                                        <span class="text-muted ml-2 mr-2">|</span>
                                        <span class="badge badge-pill badge-danger h-auto">Emergency</span>
                                    @endif
                                </div>


                            </div>

                            
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            @endforeach


            
                
                
    

</div>
<!-- row closed -->
@endsection
@section('js')

@endsection



