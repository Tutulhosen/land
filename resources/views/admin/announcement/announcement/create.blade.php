<div id="add-announcement-modal" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog large-modal modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>
                    Announcement</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form method="POST" action="{{ route('announcement.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card-body" style="max-height: 70vh; overflow-y: auto;">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="agency">Agency Name <span class="text-danger">*</span></label>
                                    <select class="form-select form-control customer_agency_name" name="customer_agency_name" id="customer_agency_name" placeholder="Expense Category">
                                        <option>--Select--</option>
                                        @foreach ($agencies as $agency)
                                            <option value="{{$agency->id}}">{{$agency->agency_name}}</option>
                                        @endforeach
                            
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="customer_salesman_name">Salesman Name</label>
                                        <select class="form-select form-control customer_salesman_name select2" name="customer_salesman_name[]" id="customer_salesman_name" placeholder="Expense Category">
                                        <option>--Select--</option>

                                        </select>
                               
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="publish_date">Publish Date</label>
                                    <input type="date" class="form-control custom-input" id="publish_date" name="publish_date"
                                        placeholder="Publish Date">
                                        @error('publish_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="effective_date">Effective Date</label>
                                    <input type="date" class="form-control custom-input" id="effective_date" name="effective_date"
                                        placeholder="Effective Date">
                                        @error('effective_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title">Announcement Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control custom-input" id="title" name="title"
                                        placeholder="Announcement Title" required>
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="details">Announcement Details</label>
                                    <textarea class="form-control summernote" id="details" name="details" rows="5"> </textarea>
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
                                    <select class="form-select form-control custom-input" id="status" name="status"
                                        placeholder="Expense Category">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-button-box" style="text-align: right !important">
                                <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing' ></i> Cancel</a>
                                <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing' ></i> Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer border-0">
                    <div class="modal-button-box">
                        <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing' ></i> Cancel</a>
                        <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing' ></i> Submit</button>
                    </div>
                </div> --}}
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize Select2

    $('#customer_salesman_name').select2({
        placeholder: "-- Select Salesman --",
        allowClear: true
    });

    $('.customer_agency_name').on('change', function () {

        var customer_agency_nameId = $(this).val();
        
        if (customer_agency_nameId) {
            $.ajax({
                url: "{{ url('/dashboard/get_salesman_by_agency') }}/" + customer_agency_nameId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('.customer_salesman_name').empty();
                    $('.customer_salesman_name').append('<option value="">--select Salesman--</option>');
                    $.each(data, function (key, value) {
                        $('.customer_salesman_name').append('<option value="' + value.id + '">' + value.salesman_name + '</option>');
                    });
                }
            });
        } else {
            $('.customer_salesman_name').empty();
            $('.customer_salesman_name').append('<option value="">--select--</option>');
        }
    });
});
</script>
<script>
$('#add-announcement-modal').on('shown.bs.modal', function () {
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
