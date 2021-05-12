@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Identity Cards
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Identity Cards
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
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

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                Add Identity Card
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>File Number</th>
                            <th>File Owner</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($identityCards as $identityCard)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $identityCard->number }}</td>
                                <td>{{ $identityCard->owner }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $identityCard->id }}"
                                        title="Edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $identityCard->id }}"
                                        title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit modal -->
                            <div class="modal fade" id="edit{{ $identityCard->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                Edit Identity Card
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('identitycards.update',  $identityCard->id ) }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="file_number"
                                                            class="mr-sm-2">Number
                                                            :</label>
                                                        <input id="file_number" type="text" name="file_number"
                                                            class="form-control"
                                                            value="{{ $identityCard->number }}"
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $identityCard->id }}">
                                                    </div>
                                                </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="file_owner"
                                                                class="mr-sm-2">Number
                                                                :</label>
                                                            <input id="file_owner" type="text" name="file_owner"
                                                                class="form-control"
                                                                value="{{ $identityCard->owner }}"
                                                                required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $identityCard->id }}">
                                                        </div>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-success">Submit</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete modal -->
                            <div class="modal fade" id="delete{{ $identityCard->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                Delete Identity Card
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('identitycards.destroy', $identityCard->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                Are Sure Of The Deletion Process ?'
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $identityCard->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<!-- add modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add Identity Card
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('identitycards.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Number" class="mr-sm-2">File Number
                                :</label>
                            <input id="file_number" type="text" name="file_number" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="File Owner" class="mr-sm-2">File Owner
                                :</label>
                            <input id="file_owner" type="text" name="file_owner" class="form-control">
                        </div>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>

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
