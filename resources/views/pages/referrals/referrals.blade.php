@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Referrals
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Referrals
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
                Add Referral
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Referral Source</th>
                            <th>Referral Date</th>
                            <th>Direct Beneficiary Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($referrals as $referral)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $referral->referralSource->name }}</td>
                                <td>{{ $referral->referral_date }}</td>
                                <td>{{ $referral->direct_beneficiary_name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $referral->id }}"
                                        title="Edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $referral->id }}"
                                        title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- EDIT MODAL -->
                            <div class="modal fade" id="edit{{ $referral->id }}" tabindex="-1" role="dialog"
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
                                            <!-- add_form -->
                                            <form action="{{ route('referrals.update', $referral->id) }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="referral_date" class="mr-sm-2">
                                                            Referral data:
                                                        </label>
                                                        <input id="referral_date" type="text" name="referral_date" class="form-control"
                                                            value="{{ $referral->referral_date }}"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <label for="direct_beneficiary_name" class="mr-sm-2">
                                                            Direct beneficiary name:
                                                        </label>
                                                        <input id="direct_beneficiary_name" type="text" name="direct_beneficiary_name" class="form-control"
                                                            value="{{ $referral->direct_beneficiary_name }}"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $referral->id }}">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Referral Source</label>
                                                    <select class="custom-select my-1 mr-sm-2">
                                                        <option selected>Select Source</option>
                                                        @foreach($referralSources as $referralSource)
                                                            <option value="{{$referralSource->id}}">{{$referralSource->name}}</option>
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
                            <div class="modal fade" id="delete{{ $referral->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                Delete Referral Source
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('referrals.destroy', $referral->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                Are Sure Of The Deletion Process ?'
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $referral->id }}">
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
                    Add Referral
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('referrals.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="referral_date" class="mr-sm-2">Referral Date:</label>
                            <input id="referral_date" type="text" name="referral_date" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="direct_beneficiary_name" class="mr-sm-2">Direct Beneficiary Name:</label>
                            <input id="direct_beneficiary_name" type="text" name="direct_beneficiary_name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputCity">Referral Source</label>
                        <select class="custom-select my-1 mr-sm-2" name="referral_source">
                            <option selected>Select Source</option>
                            @foreach($referralSources as $referralSource)
                                <option value="{{$referralSource->id}}">{{$referralSource->name}}</option>
                            @endforeach
                        </select>
                        @error('Nationality_Father_id')
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
