@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
All Individuals
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
All Individuals
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

                {{-- Table --}}
                <div class="table-responsive">
                    <table id="datatable" class="table table-hover table-sm table-bordered p-0"
                        data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>   
                                <th class="align-middle">File Number</th>
                                <th class="align-middle">Individual ID</th>
                                <th class="align-middle">Individual Passport #</th>                     
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Native Name</th>
                                <th class="align-middle">Relationship</th>
                                <th class="align-middle">Age</th>
                                <th class="align-middle">Gender</th>
                                <th class="align-middle">Nationality</th>
                                <th class="align-middle">Current Phone #</th>
                                <th class="align-middle">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($individuals as $individual)
                                <tr>
                                    <td>{{ $individual->file->number }}
                                    <td>{{ $individual->individual_id }}
                                    <td>{{ $individual->passport_number }}
                                    <td>{{ $individual->name }}
                                    <td>{{ $individual->native_name }}
                                    <td>{{ $individual->relationship->name }}
                                    <td>{{ $individual->age }}</td>
                                    <td>{{ $individual->gender->name }}</td>
                                    <td>{{ $individual->nationality->name }}</td>
                                    <td>{{ $individual->current_phone_number }}</td>
                                    <td>
                                        <a href="{{route('individuals.show', $individual->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Show</a>
                
                                        <a href="{{route('individuals.edit', $individual->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_individual{{ $individual->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="delete_individual{{$individual->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('individuals.destroy', $individual->id)}}" method="post">
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
                                                <input type="hidden" name="id"  value="{{$individual->id}}">
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
                {{-- End table --}}  
                    
            </div>
        </div>
            
        
    </div>
</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@endsection
