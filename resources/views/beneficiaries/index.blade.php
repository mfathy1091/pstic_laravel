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
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
