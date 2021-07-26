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
                            {{ $pssCase->directIndividual->file->number }}
                            <span class="text-muted ml-2 mr-2">|</span>
                            {{ $pssCase->directIndividual->name }},
                            {{ $pssCase->directIndividual->nationality->name }},
                            {{ $pssCase->directIndividual->gender->name }},
                            {{ $pssCase->directIndividual->age }} yrs
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
                                <h4 class="text-dark">Monthly Records</h4>
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

                                    <!-- Follow Ups and its modal-->
                                    @include('pss_cases.partials.follow_ups')
                                    <!-- End Follow Ups -->
                                    
                                    <br>      
                                    <hr>

                                    <!-- Benefits and its modal-->
                                    @include('pss_cases.partials.benefits')
                                    <!-- end benefits -->

                                    
                                </div>


                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

</div>
<!-- row closed -->


@endsection
@section('js')

@endsection



