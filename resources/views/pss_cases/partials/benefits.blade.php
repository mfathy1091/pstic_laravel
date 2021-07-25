{{-- Benefits --}}
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h5>PSS Benefits</h2>
        </div>
        <div class="pull-right">
            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addServiceModal{{ $record->id }}">
                Add PSS Benefit
            </button>                                      
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">

        @if(!$record->benefits->isEmpty())

            <div class="table-responsive">
                <table id="datatable1" class="table w-auto table-hover table-sm table-bordered p-0"
                    data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>                            
                            <th>Provide Date</th>
                            <th>Benefit</th>
                            <th>Beneficiaries</th>
                            <th class="align-middle">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                            
                        @foreach($record->benefits as $benefit)
                            <tr>
                                <td>{{ $benefit->provide_date }}</td>
                                <td>{{ $benefit->service->name }}</td>
                                <td>
                                    @foreach ($benefit->beneficiaries as $beneficiary)
                                            
                                            <div>{{ $beneficiary->individual->name }}</div>
                                    @endforeach
                                </td>
                                <td>        
                                    <a href="{{route('benefits.edit', $benefit->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_benefit{{ $benefit->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            {{-- Delete Modal --}}
                            <div class="modal fade" id="delete_benefit{{$benefit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('benefits.destroy', $benefit->id)}}" method="post">
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
                                            <input type="hidden" name="id"  value="{{$benefit->id}}">
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
                            {{-- End Delete Modal --}}

                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div>This Month has no provided benefits!</div>
        @endif

    </div>
    
</div>


<!-- ADD Benefit MODAL -->
<div class="modal fade" id="addServiceModal{{ $record->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        Add Benefit
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('benefits.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="pss_case_id" value="{{ $pssCase->id }}">
                        <input type="hidden" name="record_id" value="{{ $record->id }}">


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="provide_date">Provide Date</label>
                                <div class='input-group date'>
                                    <input class="form-control" type="text"  id="datepicker-action" name="provide_date" data-date-format="dd-mm-yyyy" autocomplete="off" required>
                                </div>
                                @error('provide_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>  

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Service</label>
                                <select class="custom-select my-1 mr-sm-2" name="service_id">
                                    <option selected>Select Service</option>
                                    @foreach($pssServices as $pssService)
                                        <option value="{{$pssService->id}}">{{$pssService->name}}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>                

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="beneficiaries" class="mr-sm-2">Beneficiaries:</label>
                                <div>
                                    <select class="form-select" multiple aria-label="beneficiaries" name="beneficiaries[]">
                                        @foreach ($beneficiaries as $beneficiary)
                                            <option value="{{ $beneficiary->id }}">{{ $beneficiary->individual->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End Add Service Modal -->