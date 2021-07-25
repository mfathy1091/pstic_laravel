{{-- visits --}}
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h5>Visits</h2>
        </div>
        <div class="pull-right">
            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addVisitModal{{ $record->id }}">
                Add Visit
            </button>                                                 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        @if(!$record->visits->isEmpty())

            <div class="table-responsive">
                <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
                    data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>                            
                            <th class="align-left">Date</th>
                            <th class="align-left">Comment</th>
                            <th class="align-middle">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($record->visits as $visit)
                            <tr>
                                <td>{{ $visit->visit_date }}</td>
                                <td>{{ $visit->comment }}</td>
                                <td>        
                                    <a href="{{route('visits.edit', $visit->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_visit{{ $visit->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            {{-- Delete Modal --}}
                            <div class="modal fade" id="delete_visit{{$visit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('visits.destroy', $visit->id)}}" method="post">
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
                                            <input type="hidden" name="id"  value="{{$visit->id}}">
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
            <div>This Month has no visits!</div>
        @endif
    </div>
    
</div>

<!-- ADD Visit MODAL -->
<div class="modal fade" id="addVisitModal{{ $record->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        Add Visit
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('visits.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="pss_case_id" value="{{ $pssCase->id }}">
                        <input type="hidden" name="record_id" value="{{ $record->id }}">


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="visit_date">Visit Date</label>
                                <div class='input-group date'>
                                    <input class="form-control" type="text"  id="datepicker-action" name="visit_date" data-date-format="dd-mm-yyyy" autocomplete="off" required>
                                </div>
                                @error('visit_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>               

                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" id="comment" rows="3" name="comment" ></textarea>
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
    <!-- End Add Visit Modal -->