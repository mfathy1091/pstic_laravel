@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
Add New UNHCR File
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Add New UNHCR File
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
                            <form action="{{route('files.store')}}" method="post">
                            @csrf
                            
                            
                            <br>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="text-primary">
                                        File Details
                                    </h5>
                
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="number" class="mr-sm-2">File Number</label>
                                            <input id="number" type="text" name="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            <br>
                
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="text-primary">
                                        Principal Applicant
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="individual_id" class="mr-sm-2">Individual ID</label>
                                            <input id="individual_id" type="text" name="individual_id" class="form-control">
                                        </div>
                                    </div>
                
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="passport_number" class="mr-sm-2">Passport ID</label>
                                            <input id="passport_number" type="text" name="passport_number" class="form-control">
                                        </div>
                                    </div>
                
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name" class="mr-sm-2">Name</label>
                                            <input id="name" type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="native_name" class="mr-sm-2">Native Name</label>
                                            <input id="native_name" type="text" name="native_name" class="form-control">
                                        </div>
                                    </div>
                
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="age" class="mr-sm-2">age</label>
                                            <input id="age" type="text" name="age" class="form-control">
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

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="current_phone_number" class="mr-sm-2">Current Phone Number</label>
                                            <input id="current_phone_number" type="text" name="current_phone_number" class="form-control">
                                        </div>
                                    </div>
                
                                </div>
                            </div>

                            <br>
                            <button class="btn btn-success btn-sm nextBtn btn-sm pull-left" type="submit">Save</button>
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
