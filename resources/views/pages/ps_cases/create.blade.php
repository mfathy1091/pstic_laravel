@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
Add PS Case
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Add PS Case
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>

                            <form action="{{route('pscases.store')}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <label for="file_number" class="mr-sm-2">File Number:</label>
                                    <input id="file_number" type="text" name="file_number" class="form-control">
                                </div>
                            </div>
                                
                            <div class="form-row">
                                <div class="col">
                                    <label for="referral_date">Referral Date</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text"  id="datepicker-action" name="referral_date" data-date-format="dd-mm-yyyy"  required>
                                    </div>
                                    @error('referral_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="col">
                                    <label for="direct_beneficiary_name" class="mr-sm-2">Direct Beneficiary Name:</label>
                                    <input id="direct_beneficiary_name" type="text" name="direct_beneficiary_name" class="form-control">
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="col">
                                    <label for="direct_beneficiary_age" class="mr-sm-2">Age:</label>
                                    <input id="direct_beneficiary_age" type="text" name="direct_beneficiary_age" class="form-control">
                                </div>
                            </div>
        
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputState">Gender</label>
                                    <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                        <option selected disabled>Choose...</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
        
                            
        
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">Nationality</label>
                                    <select class="custom-select my-1 mr-sm-2" name="nationality_id">
                                        <option selected disabled>Choose...</option>
                                        @foreach($nationalities as $nationality)
                                            <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('nationality_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group col-md-6">
                                <label for="inputCity">Referral Source</label>
                                <select class="custom-select my-1 mr-sm-2" name="referral_source_id">
                                    <option selected>Select Source</option>
                                    @foreach($referralSources as $referralSource)
                                        <option value="{{$referralSource->id}}">{{$referralSource->name}}</option>
                                    @endforeach
                                </select>
                                @error('referral_source_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <div class="form-group col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Yes" id="flexCheckDefault" name="is_emergency">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Emergency
                                    </label>
                                </div>
                            </div>
        
                            <div class="form-group col-md-6">
                                <label for="ps_worker_id">Assigned PSW</label>
                                <select class="custom-select my-1 mr-sm-2" name="ps_worker_id">
                                    <option selected>Select PSW</option>
                                    @foreach($psWorkers as $psWorker)
                                        <option value="{{$psWorker->id}}">{{$psWorker->name}}</option>
                                    @endforeach
                                </select>
                                @error('ps_worker_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <br><br>


                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save</button>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
