@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
Add PSS Case
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Add PSS Case
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            
            <form action="{{ route('psw.psscases.store') }}" method="post">
                @csrf
                <div class="card">

                    <div class="card-header">
                        <h5 class="text-primary">
                            Referral Details
                        </h5>
                    </div>

                    <div class="card-body">

                        <input id="fie_id" type="hidden" name="file_id" class="form-control" value="{{ $file->id }}">

                        <div class="form-group">
                            <label for="file_number" class="mr-sm-2">File Number</label>
                            <input id="file_number" type="text" name="file_number" class="form-control" value="{{ $file->number }}">
                        </div>

                        <div class="form-group">
                            <label for="inputCity">Referral Source</label>
                            <select class="custom-select" name="referral_source_id">
                                <option selected>Select Source</option>
                                @foreach($referralSources as $referralSource)
                                    <option value="{{$referralSource->id}}">{{$referralSource->name}}</option>
                                @endforeach
                            </select>
                            @error('referral_source_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="referral_date">Referral Date</label>
                            <div class='input-group date'>
                                <input class="form-control" type="text"  id="datepicker-action" name="referral_date" data-date-format="dd-mm-yyyy" autocomplete="off" required>
                            </div>
                            @error('referral_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="referring_person_name" class="mr-sm-2">Referring Person Name</label>
                            <input id="referring_person_name" type="text" name="referring_person_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="referring_person_email" class="mr-sm-2">Referring Person Email</label>
                            <input id="referring_person_email" type="text" name="referring_person_email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="reasons" class="mr-sm-2">Reasons</label>
                            <div>
                                <select class="form-select" multiple aria-label="reasons">
                                    @foreach ($reasons as $reason)
                                        <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-header">
                        <h5 class="text-primary">
                            PSS
                        </h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="beneficiaries" class="mr-sm-2">Beneficiaries:</label>
                            <div>
                                <select class="form-select" multiple aria-label="beneficiaries" name="beneficiaries[]">
                                    <?php $individuals = $file->individuals; ?>
                                    @foreach ($individuals as $individual)
                                        <option value="{{ $individual->id }}">{{ $individual->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputCity">Choose Direct Beneficiary</label>
                            <select class="custom-select my-1 mr-sm-2" name="direct_individual_id">
                                <?php $individuals = $file->individuals; ?>
                                @foreach($individuals as $individual)
                                    <option value="{{$individual->id}}">{{$individual->name}}</option>
                                @endforeach
                            </select>
                            @error('direct_individual_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Yes" id="flexCheckDefault" name="is_emergency">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Emergency
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <br>

                <button class="btn btn-success btn-sm nextBtn btn-lg pull-left" type="submit">Save</button>
            </form>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
