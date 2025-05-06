<div class="modal fade bs-example-modal-center" id="editModalgrid-plot_size-{{ $plot_size->id }}" tabindex="-1"
   aria-labelledby="editModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-header">
             <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Edit Plot Type</h4>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5">
            <form action="{{ route('plot_size.update', $plot_size->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
                <div class="row">

                  <div class="col-lg-12">
                     <div class="form-group">
                        <label for="plot_type">Plot Type Name</label>
                        <select class="form-control" name="plot_type" id="plot_type" required>
                           <option value="">--select plot type--</option>
                           @foreach ($plot_types as $plot_type)
                           <?php 
                              if ($plot_type->id== $plot_size->plot_type_id) {
                                 $selected= "selected";
                              } else {
                                 $selected= " ";
                              }
                              
                           ?>
                              <option value="{{ $plot_type->id }}" {{$selected}}>{{ $plot_type->name }}</option>
                           @endforeach
                        </select>
                        @error('plot_type') <span class="text-danger">{{ $message }}</span> @enderror
                     </div>
                  </div>

                  <div class="col-lg-12">
                     <div class="form-group">
                        <label for="size_name"> Plot size Name</label>
                        <input type="text" name="size_name" class="form-control custom-input" value="{{$plot_size->size_name}}" id="size_name" placeholder="size name" required>
                        @error('size_name') <span class="text-danger" >{{ $message }}</span> @enderror
                     </div>
                  </div>
                   <div class="col-lg-12">
                      <div class="hstack gap-2 justify-content-center pt-4 pb-3">
                         <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing' ></i> Cancel</a>
                         <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing' ></i> Submit</button>
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
