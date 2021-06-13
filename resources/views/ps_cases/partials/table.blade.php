<div class="table-responsive">
    <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
        data-page-length="50"
        style="text-align: center">
        <thead>
            <tr>
                <th>#</th>
                <th>Current Status</th>
                <th>Referral Date</th>
                <th>File Number</th>
                <th>Referral Source</th>
                <th>Referring Person Name</th>
                <th>Referring Person Email</th>
                <th>Case Type</th>
                <th>Emergency</th>
                <th>Assigned PSW</th>
                <th>Direct Beneficiary Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Nationality</th>
                <th>Visits</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach ($tab['cases'] as $psCase)
                <tr>
                    <?php $i++; ?>
                    <td>{{ $i }}</td>
                    <td>{{ $psCase->case_status }}</td>
                    <td>{{ $psCase->referral_date }}</td>
                    <td>{{ $psCase->file_number }}</td>
                    <td>{{ $psCase->referral_source }}</td>
                    <td>{{ $psCase->referring_person_name }}</td>
                    <td>{{ $psCase->referring_person_email }}</td>
                    <td>{{ $psCase->case_type }}</td>                                              
                    <td>{{ $psCase->is_emergency }}</td>
                    <td>{{ $psCase->employee->name }}</td>

                    <td>{{ $psCase->direct_beneficiary_name }}</td>
                    <td>{{ $psCase->direct_beneficiary_age }}</td>
                    <td>{{ $psCase->direct_beneficiary_gender }}</td>
                    <td>{{ $psCase->direct_beneficiary_nationality }}</td>



                    <td>
                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Show
                                        </button>
                                        
                    </td>

                    <td>
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
            @endforeach
        </tbody>
    </table>
</div>