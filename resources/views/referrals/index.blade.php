@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
All Referrals
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
All Referrals
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
                <a href="{{route('referrals.create')}}" class="btn btn-success btn-sm" role="button"
                aria-pressed="true">Add Referral</a>
                <br><br>

                <!-- table-->
                <div class="table-responsive">
                    <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
                        data-page-length="50"
                        style="text-align: center">
                        <thead >
                            <tr>
                                <th class="align-middle">#</th>
                                <th class="align-middle">File Number</th>
                                <th class="align-middle">Referral Source</th>
                                <th class="align-middle">Referral Date</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($referrals as $referral)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $referral->file->number }}</td>
                                    <td>{{ $referral->referralSource->name }}</td>
                                    <td>{{ $referral->referral_date }}</td>

                                    <td>
                                        <a href="{{route('referrals.show',$referral->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Show</a>
                
                                        <a href="{{route('referrals.edit',$referral->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_ps_case{{ $referral->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                
                
                
                                <div class="modal fade" id="delete_referral{{$referral->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('referrals.destroy','test')}}" method="post">
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
                                                <input type="hidden" name="id"  value="{{$referral->id}}">
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
                <!-- end table -->
                    
                    
            </div>
        </div>
            
        
    </div>
</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@endsection
