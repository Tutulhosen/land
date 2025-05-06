<!--Chart of Accounts Edit Modal-->
<div id="editRowModal-documenttemplate-{{ $documenttemplate->id }}" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="card modal-dialog large-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Edit documenttemplates</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <form action="{{ route('documenttemplate.update', $documenttemplate->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="documenttemplate_name">Document Template Name<span class="required-label text-danger">*</span></label>
                                    <input type="text" class="form-control custom-input" id="documenttemplate_name" name="documenttemplate_name"
                                        placeholder="Document Template Name" value="{{ old('documenttemplate_name', $documenttemplate->documenttemplate_name) }}" required>
                                        @error('documenttemplate_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="template">Template</label>
                                    <textarea class="form-control summernote" rows="6" cols="4" name="template"
                                        placeholder="Write Here">{{ old('template', $documenttemplate->template) }}</textarea>
                                        @error('template') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <select class="form-select form-control custom-input" name="status" id="status">
                                            <option  value="1" {{$documenttemplate->status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$documenttemplate->status == 0 ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <div class="modal-button-box">
                        <button type="button" class="cancel-button-1" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing'></i> Cancel</button>
                        <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing'></i> Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Chart of Accounts Edit Modal-->
