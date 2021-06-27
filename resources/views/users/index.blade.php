@extends('layouts.master')
@section('css')

@section('title')
Users
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Manage Users
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
        @can('user-create')
        <a href="{{route('users.create')}}" class="btn btn-success btn-sm" role="button"
        aria-pressed="true">Add User</a>
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
                        <th>Email</th>
                        <th>User Status</th>
                        <th>Roles</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead >
                <tbody>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




{!! $data->render() !!}


@endsection

@section('js')

@endsection
