@extends('layouts.master')
@section('css')

@section('title')
Beneficiaries
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Beneficiaries
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Month
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="">January</a>
                        <a class="dropdown-item" href="">February</a>
                        <a class="dropdown-item" href="">March</a>
                        <a class="dropdown-item" href="">April</a>
                        <a class="dropdown-item" href="">May</a>
                        <a class="dropdown-item" href="">June</a>
                    </div>
                </div>

                <br>
                
                <div class="table-responsive">
                    <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
                        data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>                            
                                <th class="align-middle">Month</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Age</th>
                                <th class="align-middle">Gender</th>
                                <th class="align-middle">Nationality</th>
                                <th class="align-middle">Benefits</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($beneficiaries as $beneficiary)
                                <tr>
                                    <td>{{ $beneficiary->record->month->name }}</td>
                                    <td>
                                        {{ $beneficiary->individual->name }}
                                        @if ($beneficiary->is_direct === '1')
                                            <span class="badge badge-pill badge-secondary ml-4 font-weight-bold font-italic">Direct</span>
                                        @endif
                                    </td>
                                    <td>{{ $beneficiary->individual->age }}</td>
                                    <td>{{ $beneficiary->individual->gender->name }}</td>
                                    <td>{{ $beneficiary->individual->nationality->name }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($beneficiary->benefits as $benefit)
                                                <li>{{ $benefit->service->name }}</li>
                                            @endforeach   
                                        </ul>    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection


