@extends('layouts.master')
@section('css')

@section('title')
Case Details
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Case Details
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                {{ $psCase }}

                <h3>Indirect Beneficiaries</h3>
                <div class="table-responsive">
                    <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
                        data-page-length="50"
                        style="text-align: center">
                        <thead >
                            <tr>
                                <th class="align-middle">#</th>
                
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Age</th>
                                <th class="align-middle">Gender</th>
                                <th class="align-middle">Nationality</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            <?php $indirectBeneficiaries = $psCase->beneficiariesIndirect; ?>
                            @forelse ($indirectBeneficiaries as $indirectBeneficiary)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td> 
                                    <td>{{ $indirectBeneficiary->name }}</td>
                                    <td>{{ $indirectBeneficiary->age }}</td>
                                    <td>{{ $indirectBeneficiary->gender->name }}</td>
                                    <td>{{ $indirectBeneficiary->nationality->name }}</td>
                
                                    <td>
                                        <a href="{{route('pscases.allcases.show',$psCase->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Show</a>
                
                                        <a href="{{route('pscases.allcases.edit',$psCase->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_ps_case{{ $psCase->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                
                                <div class="modal fade" id="delete_ps_case{{$psCase->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('pscases.allcases.destroy','test')}}" method="post">
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
                                                <input type="hidden" name="id"  value="{{$psCase->id}}">
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
                            @empty
                                <p>N/A</h3>
                            @endforelse
                        </tbody>
                    </table>
                </div>


                <h3>Visits</h3>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection



