@extends('layouts.master')
@section('css')

@section('title')
    Individual Details
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Individual Details
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="form-group">
                    <strong>File Number:</strong>
                    {{ $individual->file->number }}
                </div>
                
                <div class="form-group">
                    <strong>Individual ID:</strong>
                    {{ $individual->individual_id }}
                </div>
                
                <div class="form-group">
                    <strong>Passport Number:</strong>
                    {{ $individual->passport_number }}
                </div>

                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $individual->name }}
                </div>
                
                <div class="form-group">
                    <strong>Native Name:</strong>
                    {{ $individual->native_name }}
                </div>

                <div class="form-group">
                    <strong>Age:</strong>
                    {{ $individual->age }}
                </div>

                <div class="form-group">
                    <strong>Gender:</strong>
                    {{ $individual->gender->name }}
                </div>

                <div class="form-group">
                    <strong>Nationality:</strong>
                    {{ $individual->nationality->name }}
                </div>

                <div class="form-group">
                    <strong>Relationship:</strong>
                    {{ $individual->relationship->name }}
                </div>

                <div class="form-group">
                    <strong>Current Phone Number:</strong>
                    {{ $individual->current_phone_number}}
                </div>

            </div>

            <hr>


            <!-- Tabs -->
            <h5 class="ml-3">Additional Info Related to {{ $individual->file->number }}</h5>

            <?php $file = $individual->file; ?>
            <div class="card-body">
                
                <ul class="nav nav-pills nav-fill mb-3" id="myTab" role="tablist">
                    <li class="nav-item border border-secondary rounded" role="presentation">
                        <a class="nav-link active" id="individuals-tab" data-toggle="tab" href="#individuals" role="tab" aria-controls="individuals" aria-selected="true">Related Individuals</a>
                    </li>
                    
                    @can('pss-case-list')
                        <li class="nav-item border border-secondary rounded" role="presentation">
                            <a class="nav-link" id="pss-cases-tab" data-toggle="tab" href="#pss-cases" role="tab" aria-controls="pss-cases" aria-selected="false">Related PSS Cases</a>
                        </li>
                    @endcan

                    @can('housing-case-list')
                        <li class="nav-item border border-secondary rounded" role="presentation">
                            <a class="nav-link" id="housing-cases-tab" data-toggle="tab" href="#housing-cases" role="tab" aria-controls="housing-cases" aria-selected="false">Housing Cases</a>
                        </li>
                    @endcan

                </ul>
                
                
                <div class="tab-content" id="myTabContent">
                    <!-- Individuals tab pane -->
                    <div class="tab-pane fade show active" id="individuals" role="tabpanel" aria-labelledby="individuals-tab">            
                        {{-- add button --}}
                        @can('individual-create')
                        <a href="{{route('individuals.create', [$file->id])}}" class="btn btn-success btn-sm mb-3" role="button" aria-pressed="true">
                            Add Individual
                        </a>
                        @endcan
                            <!-- table -->
                            @include('files.partials.beneficiaries')
                            <!-- end table -->

                    </div>
                    <!-- End Individuals tab pane -->
                    

                    <!-- PSS Cases tab pane-->
                    @can('pss-case-list')
                        <div class="tab-pane fade" id="pss-cases" role="tabpanel" aria-labelledby="pss-cases-tab">
                            {{-- add button --}}
                            @can('pss-case-create')
                                <a href="{{route('psscases.create', [$individual->id])}}" class="btn btn-success btn-sm mb-3" role="button" aria-pressed="true">
                                    Add PSS Case
                                </a>
                            @endcan

                            <!-- table -->
                            @include('files.partials.pss_cases')
                            <!-- end table -->

                        </div>
                    @endcan
                    <!-- End PSS Cases tab pane -->


                    <!-- Housing Cases tab pane-->
                    @can('housing-case-list')
                        <div class="tab-pane fade" id="housing-cases" role="tabpanel" aria-labelledby="housing-cases-tab">
                            @can('housing-case-create')
                            <a href="" class="btn btn-success btn-sm mb-3" role="button" aria-pressed="true">
                                Add Housing Case
                            </a>
                            <p>N/A</p>
                        @endcan
        
                        </div>
                    @endcan


                </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
