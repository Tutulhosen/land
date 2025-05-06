<div id="editRowModal-leavetype-{{ $leavetype->id }}" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="card modal-dialog large-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>
                    Edit Leave Type</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('leavetype.update', $leavetype->id) }}" method="POST" enctype="multipart/form-data" id="leave_type_edit-{{ $leavetype->id }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="leave_name">Leave Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control custom-input" name="leave_name" id="leave_name"
                                        placeholder="Leave Name" value="{{ old('leave_name', $leavetype->leave_name ?? '') }}" required>
                                    @error('leave_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                   <label for="leave_days">Leave Days <span class="text-danger">*</span></label>
                                   <input type="text" name="leave_days" value="{{ old('leave_days', $leavetype->leave_days) }}"
                                          class="form-control custom-input" id="leave_days" placeholder="Leave Days" required>
                                   @error('leave_days') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                             </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="available_for">Available For <span class="text-danger">*</span></label>
                                    <select class="form-select form-control custom-input " name="available_for" id="available_for-{{ $leavetype->id }}" required>
                                        <option value="" disabled selected>--Select--</option>
                                        <option value="all_employee" {{ old('available_for', $leavetype->available_for ?? '') == 'all_employee' ? 'selected' : '' }}>All Employee</option>
                                        <option value="gender_wise" {{ old('available_for', $leavetype->available_for ?? '') == 'gender_wise' ? 'selected' : '' }}>Gender Wise</option>
                                        <option value="religion_wise" {{ old('available_for', $leavetype->available_for ?? '') == 'religion_wise' ? 'selected' : '' }}>Religion Wise</option>
                                    </select>
                                    @error('available_for') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Gender dropdown -->
                            <div class="col-sm-6" id="gender_dropdown-{{ $leavetype->id }}" style="{{ old('available_for', $leavetype->available_for ?? '') == 'gender_wise' ? 'display:block;' : 'display:none;' }}">
                                <div class="form-group">
                                    <label for="gender">Select Gender <span class="text-danger">*</span></label>
                                    <select class="form-select form-control custom-input " name="gender_id" id="gender-{{ $leavetype->id }}">
                                        <option value="" disabled selected>--Select--</option>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}" {{ old('gender_id', $leavetype->gender_id ?? '') == $gender->id ? 'selected' : '' }}>{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Religion dropdown -->
                            <div class="col-sm-6" id="religion_dropdown-{{ $leavetype->id }}" style="{{ old('available_for', $leavetype->available_for ?? '') == 'religion_wise' ? 'display:block;' : 'display:none;' }}">
                                <div class="form-group">
                                    <label for="religion">Select Religion <span class="text-danger">*</span></label>
                                    <select class="form-select form-control custom-input " name="religion_id" id="religion-{{ $leavetype->id }}">
                                        <option value="" disabled selected>--Select--</option>
                                        @foreach ($religions as $religion)
                                            <option value="{{ $religion->id }}" {{ old('religion_id', $leavetype->religion_id ?? '') == $religion->id ? 'selected' : '' }}>{{ $religion->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="available_from">Available From <span class="text-danger">*</span></label>
                                    <select class="form-select form-control custom-input " name="available_from" id="available_from-{{ $leavetype->id }}" required>
                                        <option value="joining_date" {{ old('available_from', $leavetype->available_from ?? '') == 'joining_date' ? 'selected' : '' }}>Joining Date</option>
                                        <option value="confirmation_date" {{ old('available_from', $leavetype->available_from ?? '') == 'confirmation_date' ? 'selected' : '' }}>Confirmation Date</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="applicable_after">Applicable After (Days) <span class="text-danger">*</span></label>
                                    <input type="number" name="applicable_after" min="0" class="form-control custom-input"
                                           value="{{ old('applicable_after', $leavetype->applicable_after) }}" id="applicable_after" placeholder="Enter Days" required>
                                    @error('applicable_after') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="leave_duration_id">Duration</label>
                                    <select class="form-select form-control custom-input " id="leave_duration_id-{{ $leavetype->id }}" name="leave_duration_id">
                                        <option value="" selected disabled>--Select--</option>
                                        @foreach ($leaveduration as $duration)
                                        <option value="{{$duration->id}}" {{ $leavetype->leave_duration_id == $duration->id ? 'selected' : '' }}>{{$duration->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('leave_duration_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="allocation_method">Leave Allocation Method</label>
                                    <select class="form-select form-control custom-input " name="allocation_method" id="allocation_method-{{ $leavetype->id }}">
                                        <option value="yearly_basis" {{ old('allocation_method', $leavetype->allocation_method ?? '') == 'yearly_basis' ? 'selected' : '' }}>Yearly Basis</option>
                                        <option value="service_life" {{ old('allocation_method', $leavetype->allocation_method ?? '') == 'service_life' ? 'selected' : '' }}>Service Life</option>
                                        <option value="work_on_holiday_basis" {{ old('allocation_method', $leavetype->allocation_method ?? '') == 'work_on_holiday_basis' ? 'selected' : '' }}>Work on Holiday Basis</option>
                                    </select>
                                    @error('allocation_method') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                             <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="notification_period_id">Notification Period</label>
                                    <select class="form-select form-control custom-input " id="notification_period_id-{{ $leavetype->id }}" name="notification_period_id">
                                        <option value="" disabled selected>--Select--</option>
                                        @foreach ($notificationperiod as $notification)
                                        <option value="{{$notification->id}}" {{ $leavetype->notification_period_id == $notification->id ? 'selected' : '' }}>{{$notification->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('notification_period_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="carry_forward_limit_id">Carry Forward Limit</label>
                                    <select class="form-select form-control custom-input " id="carry_forward_limit_id-{{ $leavetype->id }}" name="carry_forward_limit_id">
                                        <option value="" selected disabled>--Select--</option>
                                        @foreach ($carryforwardlimit as $limit)
                                        <option value="{{$limit->id}}" {{ $leavetype->carry_forward_limit_id == $limit->id ? 'selected' : '' }}>{{$limit->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('carry_forward_limit_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="send_email">
                                        <input type="checkbox" class="form-checkbox mr-1" name="send_email" id="send_email" {{ $leavetype->send_email ? 'checked' : '' }}>
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
                            <i class='bx bx-upload bx-flashing'></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // select2 for edit
        const selectElements = [
            "#available_for-{{ $leavetype->id }}",
            "#gender-{{ $leavetype->id }}",
            "#religion-{{ $leavetype->id }}",
            "#available_from-{{ $leavetype->id }}",
            "#allocation_method-{{ $leavetype->id }}",
            "#notification_period_id-{{ $leavetype->id }}",
            "#carry_forward_limit_id-{{ $leavetype->id }}",
            "#leave_duration_id-{{ $leavetype->id }}"
        ];
        selectElements.forEach(function(element) {
            $(element).select2({
                dropdownParent: $('#leave_type_edit-{{ $leavetype->id }}'),
                dropdownAutoWidth: true,
                width: '100%'
            });
        });
        
        // available for
        $('#available_for-{{ $leavetype->id }}').on('change', function() {
            var selectedValue = $(this).val();
            $('#gender_dropdown-{{ $leavetype->id }}').hide();
            $('#religion_dropdown-{{ $leavetype->id }}').hide();
            if (selectedValue === 'gender_wise') {
                $('#gender_dropdown-{{ $leavetype->id }}').show();
                $('#gender-{{ $leavetype->id }}').attr('required', 'required');
            } else if (selectedValue === 'religion_wise') {
                $('#religion_dropdown-{{ $leavetype->id }}').show();
                $('#religion-{{ $leavetype->id }}').attr('required', 'required');
            }
        }).trigger('change');
    });
</script>
@endpush
