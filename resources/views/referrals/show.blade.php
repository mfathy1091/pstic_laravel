@extends('layouts.master')
@section('css')

@section('title')
Referral Detail
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Referral Details:
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
                            {{ $referral->file->number }} <span class="text-muted ml-2 mr-2">|</span> 
                            {{ $referral->pssCase->directBeneficiary->name }} 
                            <span class="badge badge-pill badge-primary ml-3">{{ $referral->pssCase->currentCaseStatus->name }}</span>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td> 
                                        <td>{{ $referral->pssCase->directBeneficiary->name }}<span class=" text-info font-italic ml-4">Direct</span></td>
                                        <td>{{ $referral->pssCase->directBeneficiary->age }}</td>
                                        <td>{{ $referral->pssCase->directBeneficiary->gender->name }}</td>
                                        <td>{{ $referral->pssCase->directBeneficiary->nationality->name }}</td>

                                    </tr>
                                    <?php $i = 1; ?>
                                    <?php $indirectBeneficiaries = $referral->pssCase->beneficiariesIndirect; ?>
                                    @foreach ($indirectBeneficiaries as $indirectBeneficiary)
                                        <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td> 
                                            <td>{{ $indirectBeneficiary->name }}<span class="text-muted font-italic ml-4">Indirect</span></td>
                                            <td>{{ $indirectBeneficiary->age }}</td>
                                            <td>{{ $indirectBeneficiary->gender->name }}</td>
                                            <td>{{ $indirectBeneficiary->nationality->name }}</td>
                        

                                        </tr>
                        
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
                        
                </div>


                
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection



