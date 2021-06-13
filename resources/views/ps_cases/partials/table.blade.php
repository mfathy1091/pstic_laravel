<div class="table-responsive">
    <table id="datatable1" class="table  table-hover table-sm table-bordered p-0"
        data-page-length="50"
        style="text-align: center">
        <thead >
            <tr>
                <th class="align-middle">#</th>
                <th class="align-middle">File Number</th>
                <th class="align-middle">Current Status</th>
                <th class="align-middle">Emergency</th>
                <th class="align-middle">Referral Date</th>
                <th class="align-middle">Referral Source</th>
                <th class="align-middle">Case Type</th>

                <th class="align-middle">Direct Beneficiary Name</th>
                <th class="align-middle">Age</th>
                <th class="align-middle">Gender</th>
                <th class="align-middle">Nationality</th>

                <th class="align-middle">Assigned PSW</th>
                <th class="align-middle">Created By</th>


{{--                 <th class="align-middle">Referring Person Name</th>
                <th class="align-middle">Referring Person Email</th>
                <th class="align-middle">Visits</th> --}}
                <th class="align-middle">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach ($tab['cases'] as $psCase)
                <tr>
                    <?php $i++; ?>
                    <td>{{ $i }}</td>
                    <td>{{ $psCase->file_number }}</td>
                    <td>{{ $psCase->caseStatus->name }}</td>
                    <td>{{ $psCase->is_emergency }}</td>
                    <td>{{ $psCase->referral_date }}</td>
                    <td>{{ $psCase->referralSource->name }}</td>
                    <td>{{ $psCase->caseType->name }}</td>                                              
                    
                    <td>{{ $psCase->directBeneficiary->name }}</td>
                    <td>{{ $psCase->directBeneficiary->age }}</td>
                    <td>{{ $psCase->directBeneficiary->gender->name }}</td>
                    <td>{{ $psCase->directBeneficiary->nationality->name }}</td>

                    <td>{{ $psCase->employee->name }}</td>
                    <td>{{ $psCase->createdUser->name }}</td>

{{--                     <td>{{ $psCase->referring_person_name }}</td>
                    <td>{{ $psCase->referring_person_email }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Show
                        </button>         
                    </td> --}}

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
            @endforeach
        </tbody>
    </table>
</div>