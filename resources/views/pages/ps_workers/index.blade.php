@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
PS Workers
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    PS Workers
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('psworkers.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">Add PS Worker</a><br><br>
                                
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Worker Name</th>
                                            <th>Gender</th>
                                            <th>Nationality</th>
                                            <th>Team</th>
                                            <th>Area</th>
                                            <th>Recruitment Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($psWorkers as $psWorker)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{$psWorker->name}}</td>
                                            <td>{{$psWorker->gender->name}}</td>
                                            <td>{{$psWorker->nationality->name}}</td>
                                            <td>{{$psWorker->team->name}}</td>
                                            <td>{{$psWorker->area->name}}</td>
                                            <td>{{$psWorker->recruitment_date}}</td>
                                                <td>
                                                    <a href="{{route('psworkers.edit',$psWorker->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_ps_worker{{ $psWorker->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_ps_worker{{$psWorker->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('psworkers.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>'Are You Sure?'</p>
                                                            <input type="hidden" name="id"  value="{{$psWorker->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
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
