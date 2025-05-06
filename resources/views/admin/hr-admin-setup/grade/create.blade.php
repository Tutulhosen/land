<div class="modal fade bs-example-modal-center" id="Modal-grade" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-header">
             <h4 class="warranty-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Add Grade Type</h4>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5">
            <form action="{{ route('grade.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name" class="form-label">Designation <span class="text-danger">*</span></label>
                            <select class="form-select custom-select" name="designation_id" id="designation_id" required>
                                <option value="">Select a Designation</option>
                                @foreach ($designations as $designation)
                                    <option value="{{$designation->id}}">{{$designation->designation_name}}</option>
                                @endforeach
                            </select>
                            @error('designation_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Grade Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control custom-input" id="name"
                                placeholder="Grade Name" required>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- Basic Salary Input -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="basic_salary" class="form-label">Basic Salary<span class="text-danger">*</span></label>
                            <input type="number" name="basic_salary" class="form-control custom-input" id="basic_salary"
                                placeholder="Basic Salary" required>
                            @error('basic_salary') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- Toggle Switch -->
                    <div class="col-lg-6">
                        <div class="form-check form-switch d-flex align-items-center mt-3">
                            <span class="me-2 fw-bold">%</span>
                            <input class="form-check-input" type="checkbox" name="incrementType" role="switch" id="toggleType" checked>
                            <span class="me-2 fw-bold">Amount</span>
                        </div>
                    </div>

                    <!-- Increment Input Fields -->
                    <div class="col-lg-6">
                        <label for="incrementInput" class="form-label">Yearly Increment (%/Amount)</label>
                        <input type="number" name="percentage" id="percentageInput" class="form-control d-none" placeholder="Enter percentage(%)" step="0.01">
                        <input type="number" name="amount" id="amountInput" class="form-control d-none" placeholder="Enter amount">
                    </div>

                    <!-- Increment Result Display -->
                    <div class="col-lg-12 mt-4">
                        <h5 id="incrementResult" class="text-primary"></h5>
                    </div>
                    <div class="col-lg-12">
                        
                        <div class="hstack gap-2 justify-content-center pt-4 pb-3">
                            <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i
                                    class='bx bx-x bx-flashing'></i> Cancel</a>
                            <button type="submit" class="submit-button-1"><i
                                    class='bx bx-upload bx-flashing'></i> Submit</button>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </form>
          </div>
       </div>
    </div>
@push('scripts')
 <script>
     $(document).ready(function () {
         $('#designation_id').select2({
             theme: "bootstrap",
             placeholder: "--Select a Designation--",
         });
         $(document).on('shown.bs.modal', '[id^=Modal-grade]', function () {
             $(this).find('#designation_id').select2({
                 theme: "bootstrap",
                 placeholder: "--Select--",
                 width: "100%",
                 dropdownParent: $(this) // Attach dropdown to the modal
             });
         });

         function calculateIncrement() {
             let basicSalary = parseFloat($('#basic_salary').val()) || 0;
             let isNotPercentage = $('#toggleType').is(':checked');
             let incrementAmount = 0;
             let totalAmount = 0;

             if (isNotPercentage) {
                 incrementAmount = parseFloat($('#amountInput').val()) || 0;
             } else {
                 let percentage = parseFloat($('#percentageInput').val()) || 0;
                 incrementAmount = (basicSalary * percentage) / 100;
             }

             totalAmount = basicSalary + incrementAmount;

             $('#incrementResult').html(
                 `Yearly Increment Amount: <strong>${basicSalary.toFixed(2)} + ${incrementAmount.toFixed(2)} = ${totalAmount.toFixed(2)}</strong>`
             );
         }

         // Toggle between Percentage and Amount Inputs
         $('#toggleType').change(function () {
             if ($(this).is(':checked')) {
                 $('#percentageInput').addClass('d-none').val(''); // Hide percentage, clear value
                 $('#amountInput').removeClass('d-none').val(''); // Show amount, clear value
             } else {
                 $('#percentageInput').removeClass('d-none').val(''); // Show percentage, clear value
                 $('#amountInput').addClass('d-none').val(''); // Hide amount, clear value
             }
             calculateIncrement();
         });

         // Listen for changes in Basic Salary, Percentage, or Amount
         $('#basic_salary, #percentageInput, #amountInput').on('input', function () {
             calculateIncrement();
         });

     });
 </script>
@endpush
 </div>
 