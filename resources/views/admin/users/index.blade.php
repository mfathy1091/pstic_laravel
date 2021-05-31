@extends('layouts.master')
@section('css')

@section('title')
    Users
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Users
@stop
<!-- breadcrumb -->
@endsection
@section('content')


<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <a role="button" class="btn btn-success btn-sm float-left" href="{{ route('admin.users.create') }}">Create</a>
                    </div>
                </div>

                <div class="card mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a role="button" title="Edit" class="btn btn-info btn-sm" href="{{ route('admin.users.edit', $user->id) }}"><i class="fa fa-edit"></i></a>
                                    
                                    <button type="button" class="btn btn-danger btn-sm" title="Delete"
                                        onclick="event.preventDefault();
                                        document.getElementById('delete-user-form-{{ $user->id }}').submit()">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <form id="delete-user-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none">
                                        @csrf
                                        @method("DELETE")
                                    </form>
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
