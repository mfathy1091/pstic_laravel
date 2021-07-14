@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    My PSS Cases
@stop
@endsection
@section('page-header')
<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css" >
<!-- breadcrumb -->
@section('PageTitle')
My PSS Cases
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
                {!! Form::open(['action' => 'SearchController@index', 'method' => 'GET ']) !!}
                <div class="form-group">
                    <select name="statuses" id="statuses" class="form-control input-lgdynamic" data-dependent="state">
                        <option value="">All</option>
                        @foreach ($statuses as $status)
                            <option>{{ $status }}</option>
                        @endforeach
                        <option value="">Ongoing</option>
                        <option value="">Closed</option>
                    </select>
                    <br>
                    {{ Form::Submit('submit', ['class' => 'btn btn-primary']) }}
                </div>

                <!-- tabs with table-->
                @include('psw.pss_cases.partials.tabs')
                <!-- end with table -->
                    
                    
            </div>
        </div>
            
        
    </div>
</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@endsection
