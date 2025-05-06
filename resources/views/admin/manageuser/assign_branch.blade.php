<div class="modal fade bs-example-modal-center branch_assign_modal" id="branch_assign_modal-{{ $user->id }}" tabindex="-1"
    aria-labelledby="exampleModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i
                        class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Assign Branch</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.assign.branch') }}" method="POST">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="type">Select Branches</label>
                                <select name="branches[]" class="form-select form-control custom-input dept-Select2" required>
                                    @foreach($branches as $branch)

                                    <option value="{{ $branch->id }}"
                                        {{ $user->branches->contains($branch->id) ? 'selected' : '' }}
                                        >{{ $branch->name }}({{$branch->branch_code}})</option>
                                    @endforeach
                                </select>

                                @error('branch_id') <span class="text-danger">{{ $message }}</span> @enderror
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
