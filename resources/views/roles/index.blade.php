@extends('layouts.master')
@section('css')

@section('title')
Roles
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Manage Roles
@stop
<!-- breadcrumb -->
@endsection

@section('content')

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
        @can('role-create')
        <a href="{{route('roles.create')}}" class="btn btn-success btn-sm" role="button"
        aria-pressed="true">Create Role</a>
        @endcan

        <br><br>

        <div class="table-responsive">
            <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
            data-page-length="50"
            style="text-align: center">
                <thead>   
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>    
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                            @can('role-edit')
                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody> 
            </table>
        </div>
    </div>
</div>

{!! $roles->render() !!}


@endsection

@section('js')

@endsection
