@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Visits
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Visits
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
                Add PS Case
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Visit Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($visits as $visit)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $visit->date }}</td>

                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $visit->id }}"
                                        title="Edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $visit->id }}"
                                        title="Delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            {{-- <!-- EDIT MODAL -->
                            <div class="modal fade" id="edit{{ $psCase->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                Edit PS Case
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('pscases.update', $psCase->id) }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf

                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="referral_date">Referral Date</label>
                                                        <div class='input-group date'>
                                                            <input class="form-control" value="{{ $psCase->referral_date }}" type="text"  id="datepicker-action" name="referral_date" data-date-format="dd-M-yyyy"  required>
                                                        </div>
                                                        @error('referral_date')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <label for="direct_beneficiary_name" class="mr-sm-2">
                                                            Direct beneficiary name:
                                                        </label>
                                                        <input id="direct_beneficiary_name" type="text" name="direct_beneficiary_name" class="form-control"
                                                            value="{{ $psCase->direct_beneficiary_name }}"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $psCase->id }}">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Referral Source</label>
                                                    <select class="custom-select my-1 mr-sm-2">
                                                        <option selected>{{ $psCase->referralSource->name }}</option>
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
                            <div class="modal fade" id="delete{{ $psCase->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('pscases.destroy', $psCase->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                Are Sure Of The Deletion Process ?'
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $psCase->id }}">
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
                            </div> --}}


                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


{{-- <!-- ADD MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add PS Case
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('pscases.store') }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="col">
                            <label for="referral_date">Referral Date</label>
                            <div class='input-group date'>
                                <input class="form-control" type="text"  id="datepicker-action" name="referral_date" data-date-format="dd-mm-yyyy"  required>
                            </div>
                            @error('referral_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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

                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Yes" id="flexCheckDefault" name="is_emergency">
                            <label class="form-check-label" for="flexCheckDefault">
                                Emergency
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="ps_worker_id">Assigned PSW</label>
                        <select class="custom-select my-1 mr-sm-2" name="ps_worker_id">
                            <option selected>Select PSW</option>
                            @foreach($psWorkers as $psWorker)
                                <option value="{{$psWorker->id}}">{{$psWorker->name}}</option>
                            @endforeach
                        </select>
                        @error('ps_worker_id')
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
</div> --}}

</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
