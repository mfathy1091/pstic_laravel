@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Referral Activities
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Referrals Activities
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
                Add Activity
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Month</th>
                            <th>Case Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($referralActivities as $referralActivity)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $referralActivity->month->name }}</td>
                                <td>{{ $referralActivity->caseStatus->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $referralActivity->id }}"
                                        title="Edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $referralActivity->id }}"
                                        title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- EDIT MODAL -->
                            <div class="modal fade" id="edit{{ $referralActivity->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                Edit Referral
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('referralactivities.update', $referralActivity->id) }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Month</label>
                                                    <select class="custom-select my-1 mr-sm-2">
                                                        <option selected>Select Month</option>
                                                        @foreach($months as $month)
                                                            <option value="{{$month->id}}">{{$month->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('Nationality_Father_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Case Status</label>
                                                    <select class="custom-select my-1 mr-sm-2">
                                                        <option selected>Select status</option>
                                                        @foreach($caseStatuses as $caseStatus)
                                                            <option value="{{$caseStatus->id}}">{{$caseStatus->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('Nationality_Father_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
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
                            <div class="modal fade" id="delete{{ $referralActivity->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                Delete Referral Activity
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('referralactivities.destroy', $referralActivity->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                Are Sure Of The Deletion Process ?'
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $referralActivity->id }}">
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

<!-- ADD MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add Referral Activity
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('referralactivities.store') }}" method="POST">
                    @csrf




                    <div class="form-group col-md-6">
                        <label for="inputCity">Month</label>
                        <select class="custom-select my-1 mr-sm-2" name="month_id">
                            <option selected>Select Month</option>
                            @foreach($months as $month)
                                <option value="{{$month->id}}">{{$month->name}}</option>
                            @endforeach
                        </select>
                        @error('Nationality_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group col-md-6">
                        <label for="assigned_ps_worker">Case Status</label>
                        <select class="custom-select my-1 mr-sm-2" name="assigned_ps_worker">
                            <option selected>Select Status</option>
                            @foreach($caseStatuses as $caseStatus)
                                <option value="{{$caseStatus->id}}">{{$caseStatus->name}}</option>
                            @endforeach
                        </select>
                        @error('assigned_ps_worker')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
