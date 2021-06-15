@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
Files Numbers
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Files Numbers
@stop
<!-- breadcrumb -->
@endsection



@section('content')

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

                
                {{-- add button --}}
                <a href="{{route('files.create')}}" class="btn btn-success btn-sm" role="button"
                aria-pressed="true">Add New File</a>
                <br><br>

                <!-- Table -->
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                        data-page-length="50"
                        style="text-align: center">
                        <thead >
                            <tr>
                                <th class="align-middle">#</th>
                                <th class="align-middle">File Number</th>
                                <th class="align-middle">Created By</th>    <!-- what is the user is deleted -->
                                <th class="align-middle">Action</th> 

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($files as $file)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $file->number }}</td>
                                    <td>{{ $file->createdUser->name }}</td>

                
                {{--       
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Show
                                        </button>         
                                    </td> --}}
                
                                    <td>
                                        <a href="{{route('files.show',$file->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Show</a>
                
                                        <a href="{{route('files.edit',$file->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_ps_case{{ $file->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                
                
                
                                <div class="modal fade" id="delete_ps_case{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('files.destroy','test')}}" method="post">
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
                                                <input type="hidden" name="id"  value="{{$file->id}}">
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
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->
                    
                    
            </div>
        </div>
            
        
    </div>
</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@endsection
