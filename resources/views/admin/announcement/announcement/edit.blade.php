<div id="edit-announcement-modal-{{$announcement->id}}" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog large-modal modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>
                    Announcement</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form method="POST" action="{{ route('announcement.update',$announcement->id) }}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
            <div class="modal-body">
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @php
                                        $selectedBranchIds = $selectedDepartments->where('announcement_id', $announcement->id)->pluck('branch_id')->toArray();
                                    @endphp
                                    <label for="branch_id">Branch <span class="text-danger">*</span></label>
                                    <select name="branch_id" class="form-control select2">
                                        <option value="">All Branch</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{$branch->id}}" {{ in_array($branch->id, $selectedBranchIds) ? 'selected' : '' }}>{{$branch->name}} ({{$branch->branch_code}})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @php
                                        $selectedDepartmentIds = $selectedDepartments->where('announcement_id', $announcement->id)->pluck('department_id')->toArray();
                                    @endphp
                                    <label for="department_ids">Department</label>
                                    <select class="form-select form-control custom-input multiSelect2"  name="department_ids[]" multiple>
                                        <option value="all">Select All Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ in_array($department->id, $selectedDepartmentIds) ? 'selected' : '' }}>
                                                {{ $department->department_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('department_ids') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="publish_date">Publish Date</label>
                                    <input type="date" class="form-control custom-input" id="publish_date" name="publish_date"
                                        placeholder="Publish Date" value="{{$announcement->publish_date}}">
                                        @error('publish_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="effective_date">Effective Date</label>
                                    <input type="date" class="form-control custom-input" id="effective_date" name="effective_date"
                                        placeholder="Effective Date" value="{{$announcement->effective_date}}">
                                        @error('effective_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title">Announcement Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control custom-input" id="title" name="title"
                                        placeholder="Announcement Title" value="{{$announcement->title}}" required>
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="details">Announcement Details</label>
                                    <textarea class="form-control summernote" id="details" name="details" rows="5">{{$announcement->details}}</textarea>
                                    @error('details') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="attachment">Attachment</label>
                                    <input type="file" class="form-control custom-input" id="attachment" name="attachment"
                                        placeholder="Attachment">
                                        @error('attachment') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select form-control custom-input" id="status" name="status">
                                        <option value="1" {{ $announcement->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $announcement->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <div class="modal-button-box">
                        <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing' ></i> Cancel</a>
                        <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing' ></i> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
$(document).ready(function() {
    $(".select2").each(function() {
        let parentModal = $(this).closest('.modal');
        $(this).select2({
            dropdownParent: parentModal,
            dropdownAutoWidth: true,
            width: '100%'
        });
    });
});
$('#edit-announcement-modal-{{$announcement->id}}').on('shown.bs.modal', function () {
    const $multiSelect = $('.multiSelect2');

    $multiSelect.select2({
        placeholder: "Select Departments",
        allowClear: true,
        width: '100%'
    });
    $multiSelect.on('change', function () {
        const selectedValues = $(this).val();
        const allOptionValue = "all";

        if (selectedValues && selectedValues.includes(allOptionValue)) {
            const allValues = $(this).find('option')
                .map(function () {
                    return $(this).val();
                }).get().filter(val => val !== allOptionValue);
            $(this).val(allValues).trigger('change');
        }
    });
});
</script>
@endpush

