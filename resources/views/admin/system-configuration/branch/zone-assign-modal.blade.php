<div class="modal fade bs-example-modal-center zone-assign-modal" id="zone_assign_modal-{{ $branch->id }}" tabindex="-1"
    aria-labelledby="exampleModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i
                        class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Assign Zonal Offices</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('branch.assignments.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="parent_id" value="{{ $branch->id }}">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="type">Select Zonal Offices</label>
                                <select name="child_id[]" class="form-select form-control custom-input multipleSelect2" multiple required>
                                    @foreach($zonalOffices as $branch)
                                        <!-- Check if the branch is already assigned -->
                                        @if (!in_array($branch->id, $assignedChildIds))
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endif
                                    @endforeach
                                </select>


                                @error('child_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end pt-4 pb-3">
                                <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i
                                        class='bx bx-x bx-flashing'></i> Cancel</a>
                                <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing'></i> Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

