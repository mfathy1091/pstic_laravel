@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    My PS Cases
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
My PS Cases
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

                {{-- add button --}}
                <a href="{{route('psw.psscases.create')}}" class="btn btn-success btn-sm" role="button"
                aria-pressed="true">Add PS Case</a><br><br>
                <br><br>

                <!-- tabs with table-->
                @include('psw.partials.tabs')
                <!-- end with table -->
                    
                    
            </div>
        </div>
            
        
    </div>
</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@endsection
