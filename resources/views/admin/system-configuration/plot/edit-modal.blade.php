<div class="modal fade bs-example-modal-center" id="editModalgrid-plot-{{ $plot->id }}" tabindex="-1"
    aria-labelledby="editModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog large-modal modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i
                        class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Edit Plot</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for Editing plot -->
                <form action="{{ route('plot.update', $plot->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="sector">Sector <span class="text-danger">*</span></label>
                                <select name="sector" class="form-select form-control custom-input sector" id="sector"
                                    placeholder="sector" required>
                                        <option value="" selected disabled>--Select Sector--</option>
                                    @foreach ($sectors as $sector)
                                        <?php
                                            if ($sector->id== $plot->sector_id) {
                                                $selected='selected';
                                            } else {
                                                $selected='';
                                            }
                                        
                                         ?>
                                        <option value="{{$sector->id}}" {{$selected}}>{{$sector->sector_name}}</option>
                                    @endforeach
                                </select>
                                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="block">Block <span class="text-danger">*</span></label>
                                <select name="block" class="form-select form-control custom-input block" id="block"
                                    placeholder="block" required>
                                    <option value="{{$plot->block_id}}" >{{$plot->block->block_name ?? null}}</option>
                                </select>
                                @error('block') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="road">Road <span class="text-danger">*</span></label>
                                <select name="road" class="form-select form-control custom-input road" id="road"
                                    placeholder="road" required>
                                    <option value="{{$plot->road_id}}">{{$plot->road->road_name ?? null}}</option>

                                </select>
                                @error('road') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="plot_type">Plot Type <span class="text-danger">*</span></label>
                                <select name="plot_type" class="form-select form-control custom-input plot_type" id="plot_type"
                                    placeholder="plot_type" required>
                                    <option value="" selected disabled>--Select Plot Type--</option>
                                    @foreach ($plot_types as $plot_type)
                                        <?php
                                            if ($plot_type->id== $plot->plot_type_id) {
                                                $selected='selected';
                                            } else {
                                                $selected='';
                                            }
                                    
                                        ?>
                                        <option value="{{$plot_type->id}}" {{$selected}}>{{$plot_type->name}}</option>
                                    @endforeach
                                </select>
                                @error('plot_type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="plot_size">Plot Size <span class="text-danger">*</span></label>
                                <select name="plot_size" class="form-select form-control custom-input plot_size" id="plot_size"
                                    placeholder="plot_size" required>
                                    <option value="{{$plot->plot_size_id}}">{{$plot->plot_size->size_name ?? null}}</option>

                                </select>
                                @error('plot_size') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="price">Price <span class="text-danger">*</span></label>
                                <input name="price" type="text" class="form-control custom-input price" id="price" placeholder="Price" required value="{{$plot->plot_price}}">

                                </select>
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="plot_name">Plot Name <span class="text-danger">*</span></label>
                                <input name="plot_name" type="text" class="form-control custom-input" value="{{$plot->plot_name}}" id="plot_name" placeholder="Plot Name" required>

                                </select>
                                @error('plot_name') <span class="text-danger">{{ $message }}</span> @enderror
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
