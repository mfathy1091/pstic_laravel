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

        <div class="table-responsive">
            <table id="datatable1" class="table w-auto table-hover table-sm table-bordered p-0"
                data-page-length="50"
                style="text-align: center">
                <thead>
                    <tr>                            
                        <th>Beneficiary</th>
                        <th>Benefits</th>
                        <th class="align-middle">Actions</th>
                    </tr>
                </thead>
                <tbody>

                        
                    @foreach($record->beneficiaries as $beneficiary)
                        <tr>
                            <td>{{ $beneficiary->individual->name }}</td>
                            <td>
                                @foreach ($beneficiary->benefits as $benefit)                                            
                                    <div>
                                        {{ $benefit->service->name }}
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_benefit{{ $benefit->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                    </div>

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
                            </td>
                            <td>        
                            </td>
                        </tr>

                        

                    @endforeach
                </tbody>
            </table>
        </div>


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
                                <label for="inputCity">Beneficiary</label>
                                <select class="custom-select my-1 mr-sm-2" name="beneficiary_id">
                                    <option selected>Select Beneficiary</option>
                                    @foreach($record->beneficiaries as $beneficiary)
                                        <option value="{{$beneficiary->id}}">{{$beneficiary->individual->name}}</option>
                                    @endforeach
                                </select>
                                @error('beneficiary_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>                

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="services" class="mr-sm-2">Services:</label>
                                <div>
                                    <select class="form-select" multiple aria-label="services" name="services[]">
                                        @foreach ($pssServices as $pssService)
                                            <option value="{{ $pssService->id }}">{{ $pssService->name }}</option>
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