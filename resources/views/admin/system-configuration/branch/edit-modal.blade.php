<div class="modal fade bs-example-modal-center" id="editModalgrid-branch-{{ $branch->id }}" tabindex="-1"
    aria-labelledby="editModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog large-modal modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i
                        class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Edit Branch</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for Editing Branch -->
                <form action="{{ route('branch.update', $branch->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Branch Name <span class="text-danger">*</span></label>
                                <input name="name" type="text" class="form-control custom-input" id="name"
                                    placeholder="Branch Name" value="{{ old('name', $branch->name) }}" required>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="type">Branch Type <span class="text-danger">*</span></label>
                                <select name="type" class="form-select form-control custom-input" id="type"
                                    placeholder="Branch Type" disabled>
                                    <option value="" disabled>--Select--</option>
                                    <option value="regional_office" {{ $branch->type == 'regional_office' ? 'selected' : '' }}>Regional Office</option>
                                    <option value="zonal_office" {{ $branch->type == 'zonal_office' ? 'selected' : '' }}>Zonal Office</option>
                                    <option value="area_office" {{ $branch->type == 'area_office' ? 'selected' : '' }}>Area Office</option>
                                    <option value="branch_office" {{ $branch->type == 'branch_office' ? 'selected' : '' }}>Branch Office</option>
                                    <option value="liaison_office" {{ $branch->type == 'liaison_office' ? 'selected' : '' }}>Liaison Office</option>
                                </select>
                                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input name="phone" type="text" class="form-control custom-input" id="phone"
                                    placeholder="Phone Number" value="{{ old('phone', $branch->phone) }}">
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="whatsapp">WhatsApp</label>
                                <input name="whatsapp" type="text" class="form-control custom-input" id="whatsapp"
                                    placeholder="WhatsApp Number" value="{{ old('whatsapp', $branch->whatsapp) }}">
                                    @error('whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="landline">Landline Number</label>
                                <input name="landline" type="text" class="form-control custom-input" id="landline"
                                    placeholder="Landline Number" value="{{ old('landline', $branch->landline) }}">
                                    @error('landline') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input name="email" type="email" class="form-control custom-input" id="email"
                                    placeholder="Email Address" value="{{ old('email', $branch->email) }}">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="opening_date">Opening Date</label>
                                <input name="opening_date" type="text" class="form-control custom-input datepicker"
                                    id="opening_date" placeholder="Branch Opening Date" value="{{ old('opening_date', $branch->opening_date) }}">
                                    @error('opening_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="opening_time">Opening Time</label>
                                <input name="opening_time" type="text" class="form-control custom-input timepicker"
                                    id="opening_time" placeholder="Opening Time" value="{{ old('opening_time', $branch->opening_time) }}">
                                    @error('opening_time') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="address">Branch Address</label>
                                <textarea name="address" class="form-control h-100" id="address">{{ old('address', $branch->address) }}</textarea>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="closing_time">Closing Time</label>
                                <input name="closing_time" type="text" class="form-control custom-input timepicker"
                                    id="closing_time" placeholder="Closing Time" value="{{ old('closing_time', $branch->closing_time) }}">
                                    @error('closing_time') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end pt-4 pb-3">
                                <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i
                                        class='bx bx-x bx-flashing'></i> Cancel</a>
                                <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing'></i> Update</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>
