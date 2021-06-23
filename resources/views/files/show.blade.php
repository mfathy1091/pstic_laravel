@extends('layouts.master')
@section('css')

@section('title')
File Number
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ $file->number }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
    
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                

                
                <!-- File Individuals -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5>File Individuals</h5>
                        <div class="table-responsive">
                            <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50"
                                style="text-align: center">
                                <thead>
                                    <tr>
                                        <th class="align-middle">#</th>
                        
                                        <th class="align-middle">Name</th>
                                        <th class="align-middle">Age</th>
                                        <th class="align-middle">Gender</th>
                                        <th class="align-middle">Nationality</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $beneficiaries = $file->beneficiaries; ?>
                                    @foreach ($beneficiaries as $beneficiary)
                                        <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td> 
                                            <td>{{ $beneficiary->name }}{{-- <span class="text-muted font-italic ml-4">Owner</span></td> --}}
                                            <td>{{ $beneficiary->age }}</td>
                                            <td>{{ $beneficiary->gender->name }}</td>
                                            <td>{{ $beneficiary->nationality->name }}</td>
                                        </tr>
                        
                                        <div class="modal fade" id="delete_member{{$beneficiary->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="" method="post">
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
                                                        <input type="hidden" name="id"  value="{{$beneficiary->id}}">
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
                    </div>
                </div>                

                <!-- Referral History -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5>Referral History</h5>
                        <div class="table-responsive">
                            <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50"
                                style="text-align: center">
                                <thead>
                                    <tr>
                                        <th class="align-middle">#</th>
                        
                                        <th class="align-middle">Source</th>
                                        <th class="align-middle">Referral Date</th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $referrals = $file->referrals; ?>
                                    @foreach ($referrals as $referral)
                                        <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td> 
                                            <td>{{ $referral->referralSource->name }}
                                            <td>{{ $referral->referral_date }}</td>

                                            <td>
                                                <a href="{{route('referrals.show',$referral->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Show</a>
                        
                                                <a href="{{route('pscases.allcases.edit',$referral->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_ps_case{{ $referral->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                        
                                        <div class="modal fade" id="delete_member{{$beneficiary->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="" method="post">
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
                                                        <input type="hidden" name="id"  value="{{$beneficiary->id}}">
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
                    </div>
                </div> 
                
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection



