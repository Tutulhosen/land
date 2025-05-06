<div class="modal fade bs-example-modal-center" id="exampleModalgrid-leads" tabindex="-1"
    aria-labelledby="exampleModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog large-modal modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i
                        class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Create Branch</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('branch.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Branch Name <span class="text-danger">*</span></label>
                                <input name="name" type="text" class="form-control custom-input" id="name"
                                    placeholder="Branch Name" required>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="type">Branch Type <span class="text-danger">*</span></label>
                                <select name="type" class="form-select form-control custom-input" id="type"
                                    placeholder="Branch Type" required>
                                    <option value="" selected disabled>--Select--</option>
                                    <option value="regional_office">Regional Office</option>
                                    <option value="zonal_office">Zonal Office</option>
                                    <option value="area_office">Area Office</option>
                                    <option value="branch_office">Branch Office</option>
                                    <option value="liaison_office">Liaison Office</option>
                                </select>
                                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input name="phone" type="text" class="form-control custom-input" id="phone"
                                    placeholder="Phone Number">
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="whatsapp">WhatsApp</label>
                                <input name="whatsapp" type="text" class="form-control custom-input" id="whatsapp"
                                    placeholder="WhatsApp Number">
                                    @error('whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="landline">Landline Number</label>
                                <input name="landline" type="text" class="form-control custom-input" id="landline"
                                    placeholder="Landline Number">
                                    @error('landline') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input name="email" type="email" class="form-control custom-input" id="email"
                                    placeholder="Email Address">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="opening_date">Opening Date</label>
                                <input name="opening_date" type="text" class="form-control custom-input datepicker"
                                    id="opening_date" placeholder="Branch Opening Date">
                                    @error('opening_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="opening_time">Opening Time</label>
                                <input name="opening_time" type="text" class="form-control custom-input timepicker"
                                    id="opening_time" placeholder="Opening Time">
                                    @error('opening_time') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="address">Branch Address</label>
                                <textarea name="address" class="form-control h-100" id="address"></textarea>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="closing_time">Closing Time</label>
                                <input name="closing_time" type="text" class="form-control custom-input timepicker"
                                    id="closing_time" placeholder="Closing Time">
                                    @error('closing_time') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end pt-4 pb-3">
                                <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i
                                        class='bx bx-x bx-flashing'></i> Cancel</a>
                                <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing'></i> Submit</button>
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
