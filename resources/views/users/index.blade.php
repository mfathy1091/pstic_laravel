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
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Status</th>
                        <th>Roles</th>
                        <th>Title</th>
                        <th>Department</th>
                        <th>Team</th>
                        <th>Budget</th>
                        <th>Last Login</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead >
                <tbody>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->status == '1')
                                <span class="badge badge-pill badge-success h-auto font-weight-bold font-italic">Enabled</span>
                            @elseif (($user->status == '0'))
                                <span class="badge badge-pill badge-danger h-auto font-weight-bold font-italic">Disabled</span>
                            @endif
                        </td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>{{$user->jobTitle->name}}</td>
                        <td>{{$user->department->name}}</td>
                        <td>{{$user->team->name}}</td>
                        <td>{{$user->budget->name}}</td>
                        <td></td>
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
