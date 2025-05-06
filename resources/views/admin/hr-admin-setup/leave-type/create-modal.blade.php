<div id="addRowModal-leavetypes" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="card modal-dialog large-modal" role="document">
        <form action="{{ route('leavetype.store') }}" method="POST" id="leave_type_create">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="project-details-card-header-title"><i
                            class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Create Leave Type</h4>
                    <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="leave_name">Leave Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control custom-input" name="leave_name"
                                        id="leave_name" placeholder="Leave Name" required>
                                    @error('leave_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                   <label for="leave_days">Leave Days <span class="text-danger">*</span></label>
                                   <input type="text" name="leave_days" class="form-control custom-input" id="leave_days" placeholder="Leave Days" required>
                                   @error('leave_days') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                             </div>
                             <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="available_for">Available For <span class="text-danger">*</span></label>
                                    <select class="form-select form-control custom-input select2" name="available_for" id="available_for" placeholder="Available For" required>
                                        <option value="" disabled selected>--Select--</option>
                                        <option value="all_employee">All Employee</option>
                                        <option value="gender_wise">Gender Wise</option>
                                        <option value="religion_wise">Religion Wise</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Gender dropdown -->
                            <div class="col-sm-6" id="gender_dropdown" style="display:none;">
                                <div class="form-group">
                                    <label for="gender">Select Gender <span class="text-danger">*</span></label>
                                    <select class="form-select form-control custom-input select2" name="gender_id" id="gender">
                                        <option value="" disabled selected>--Select--</option>
                                        @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Religion dropdown -->
                            <div class="col-sm-6" id="religion_dropdown" style="display:none;">
                                <div class="form-group">
                                    <label for="religion">Select Religion <span class="text-danger">*</span></label>
                                    <select class="form-select form-control custom-input select2" name="religion_id" id="religion">
                                        <option value="" disabled selected>--Select--</option>
                                        @foreach ($religions as $religion)
                                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                             <div class="col-sm-6">
                                <div class="form-group">
                                   <label for="available_from">Available From <span class="text-danger">*</span></label>
                                   <select class="form-select form-control custom-input select2" name="available_from" id="available_from" placeholder="Available From" required>
                                    <option value="" disabled selected>--Select--</option>
                                      <option>Joining Date</option>
                                      <option>Confirmation Date</option>
                                   </select>
                                </div>
                             </div>
                             <div class="col-sm-6">
                                <div class="form-group">
                                   <label for="applicable_after">Applicable After (Days) <span class="text-danger">*</span></label>
                                   <input type="number" name="applicable_after" min="0" class="form-control custom-input" id="applicable_after" placeholder="Enter Days" required>
                                   @error('applicable_after') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                             </div>
                             <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <select class="form-select form-control custom-input select2" id="leave_duration_id"
                                        name="leave_duration_id" placeholder="Expense Category">
                                        <option value="" selected disabled>--Select--</option>
                                        @foreach ($leaveduration as $duration)
                                        <option value="{{$duration->id}}">{{$duration->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('leave_duration_id') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-sm-6">
                                <div class="form-group">
                                   <label for="allocation_method">Leave Allocation Method</label>
                                   <select class="form-select form-control custom-input select2" name="allocation_method" id="allocation_method">
                                    <option value="" disabled selected>--Select--</option>
                                    <option>Yearly Basis</option>
                                      <option>Service Life</option>
                                      <option>Work on Holiday Basis</option>
                                   </select>
                                   @error('allocation_method') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                             </div>
                             <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="notification_period_id">Notification Period</label>
                                    <select class="form-select form-control custom-input select2" id="notification_period_id"
                                        name="notification_period_id">
                                        <option value="" selected disabled>--Select--</option>
                                        @foreach ($notificationperiod as $notification)
                                        <option value="{{$notification->id}}">{{$notification->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('notification_period_id') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="carry_forward_limit_id">Carry Forward Limit</label>
                                    <select class="form-select form-control custom-input select2" id="carry_forward_limit_id"
                                        name="carry_forward_limit_id">
                                        <option value="" selected disabled>--Select--</option>
                                        @foreach ($carryforwardlimit as $limit)
                                        <option value="{{$limit->id}}">{{$limit->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('carry_forward_limit_id') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="send_email">
                                        <input type="checkbox" class="form-checkbox mr-1" name="send_email" id="send_email" >
                                        Send Email
                                    </label>

                                    @error('send_email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <div class="modal-button-box">

                        <button type="submit" class="submit-button-1">
                            <i class='bx bx-upload bx-flashing'></i> Submit
                        </button>
                    </div>

                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@push('scripts')
<script>
    $(document).ready(function() {
    //initialize select2
    $(".select2").select2({
        dropdownParent: $('#addRowModal-leavetypes'),
        dropdownAutoWidth: true,
        width: '100%'
    });


    $('#available_for').on('change', function() {
        var selectedValue = $(this).val();

        // Hide both dropdowns initially
        $('#gender_dropdown').hide();
        $('#religion_dropdown').hide();

        // Remove required attributes from both dropdowns
        $('#gender').removeAttr('required');
        $('#religion').removeAttr('required');

        // Show the appropriate dropdown and add required attribute
        if (selectedValue === 'gender_wise') {
            $('#gender_dropdown').show();
            $('#gender').attr('required', 'required'); // Make gender dropdown required
        } else if (selectedValue === 'religion_wise') {
            $('#religion_dropdown').show();
            $('#religion').attr('required', 'required'); // Make religion dropdown required
        }
    });

});

</script>
@endpush
