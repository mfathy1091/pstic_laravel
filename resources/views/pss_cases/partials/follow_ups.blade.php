{{-- Follow Ups --}}
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h5>Follow Ups</h2>
        </div>
        <div class="pull-right">
            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addFollowUpModal{{ $record->id }}">
                Add Follow Ups
            </button>                                                 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        @if(!$record->followUps->isEmpty())

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
                        @foreach($record->followUps as $followUp)
                            <tr>
                                <td>{{ $followUp->follow_up_date }}</td>
                                <td>{{ $followUp->comment }}</td>
                                <td>        
                                    <a href="{{route('followups.edit', $followUp->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_follow_up{{ $followUp->id }}" title="Delete"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            {{-- Delete Modal --}}
                            <div class="modal fade" id="delete_follow_up{{ $followUp->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('followups.destroy', $followUp->id)}}" method="post">
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
                                            <input type="hidden" name="id"  value="{{$followUp->id}}">
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
            <div>This Month has no follow ups!</div>
        @endif
    </div>
    
</div>

<!-- ADD Follow Up MODAL -->
<div class="modal fade" id="addFollowUpModal{{ $record->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        Add Follow Up
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('followups.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="pss_case_id" value="{{ $pssCase->id }}">
                        <input type="hidden" name="record_id" value="{{ $record->id }}">


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="follow_up_date">Follow Up Date</label>
                                <div class='input-group date'>
                                    <input class="form-control" type="text"  id="datepicker-action" name="follow_up_date" data-date-format="dd-mm-yyyy" autocomplete="off" required>
                                </div>
                                @error('follow_up_date')
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
    <!-- End Add Follow Up Modal -->