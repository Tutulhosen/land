<div class="modal fade bs-example-modal-center" id="Modal-grade-edit-{{ $grade->id }}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-header">
                <h4 class="warranty-details-card-header-title">
                    <i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i> Update Grade 
                </h4>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5">
            <form action="{{ route('grade.update',$grade->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="designation_id" class="form-label">Designation</label>
                            <select class="form-select custom-select designation_id" name="designation_id">
                                <option value="">Select a Designation</option>
                                @foreach ($designations as $designation)
                                    <option value="{{$designation->id}}" {{$grade->designation_id == $designation->id ? 'selected' : ''}}>
                                        {{$designation->designation_name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('designation_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Grade Name</label>
                            <input type="text" name="name" class="form-control custom-input name" 
                                placeholder="Grade Name" required value="{{$grade->name}}">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="basic_salary" class="form-label">Basic Salary</label>
                            <input type="number" name="basic_salary" class="form-control custom-input basic_salary" 
                                placeholder="Basic Salary" required value="{{$grade->basic_salary}}">
                            @error('basic_salary') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Toggle Switch -->
                    <div class="col-lg-6">
                        <div class="form-check form-switch d-flex align-items-center mt-3">
                            <span class="me-2 fw-bold">%</span>
                            <input class="form-check-input toggleType" type="checkbox" role="switch" 
                                {{$grade->amount != null ? 'checked' : ''}}>
                            <span class="me-2 fw-bold">Amount</span>
                        </div>
                    </div>

                    <!-- Increment Input Fields -->
                    <div class="col-lg-6">
                        <label for="incrementInput" class="form-label">Yearly Increment (%/Amount)</label>
                        <input type="number" name="percentage" class="form-control percentageInput 
                            {{ $grade->percentage != null ? '' : 'd-none' }}" 
                            placeholder="Enter percentage(%)" step="0.01" 
                            value="{{ $grade->percentage != null ? $grade->percentage : '' }}">

                        <input type="number" name="amount" class="form-control amountInput 
                            {{ $grade->amount != null ? '' : 'd-none' }}" 
                            placeholder="Enter amount" 
                            value="{{ $grade->amount != null ? $grade->amount : '' }}">
                    </div>

                    <!-- Increment Result Display -->
                    <div class="col-lg-12 mt-4">
                        <h5 class="text-primary incrementResult"></h5>
                    </div>

                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-center pt-4 pb-3">
                            <a href="#" class="cancel-button-1" data-bs-dismiss="modal">
                                <i class='bx bx-x bx-flashing'></i> Cancel
                            </a>
                            <button type="submit" class="submit-button-1">
                                <i class='bx bx-upload bx-flashing'></i> Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
          </div>
       </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $(document).on('shown.bs.modal', '[id^=Modal-grade-edit-]', function () {
            let modal = $(this);

            // Reset fields based on initial values when opening modal
            modal.find('.basic_salary').val(modal.find('.basic_salary').attr('value'));
            modal.find('.name').val(modal.find('.name').attr('value'));

            let toggleSwitch = modal.find('.toggleType');
            let percentageField = modal.find('.percentageInput');
            let amountField = modal.find('.amountInput');

            if (toggleSwitch.is(':checked')) {
                percentageField.addClass('d-none').val('');
                amountField.removeClass('d-none').val(amountField.attr('value'));
            } else {
                amountField.addClass('d-none').val('');
                percentageField.removeClass('d-none').val(percentageField.attr('value'));
            }

            modal.find('.designation_id').select2({
                theme: "bootstrap",
                placeholder: "--Select--",
                width: "100%",
                dropdownParent: modal
            });

            calculateIncrement(modal);
        });

        function calculateIncrement(modal) {
            let basicSalary = parseFloat(modal.find('.basic_salary').val()) || 0;
            let isNotPercentage = modal.find('.toggleType').is(':checked');
            let incrementAmount = 0;
            let totalAmount = 0;

            if (isNotPercentage) {
                incrementAmount = parseFloat(modal.find('.amountInput').val()) || 0;
            } else {
                let percentage = parseFloat(modal.find('.percentageInput').val()) || 0;
                incrementAmount = (basicSalary * percentage) / 100;
            }

            totalAmount = basicSalary + incrementAmount;

            modal.find('.incrementResult').html(
                `Yearly Increment Amount: <strong>${basicSalary.toFixed(2)} + ${incrementAmount.toFixed(2)} = ${totalAmount.toFixed(2)}</strong>`
            );
        }

        // Toggle between Percentage and Amount Inputs
        $(document).on('change', '.toggleType', function () {
            let modal = $(this).closest('.modal');
            let percentageField = modal.find('.percentageInput');
            let amountField = modal.find('.amountInput');

            if ($(this).is(':checked')) {
                percentageField.addClass('d-none').val('');
                amountField.removeClass('d-none');
            } else {
                amountField.addClass('d-none').val('');
                percentageField.removeClass('d-none');
            }
            calculateIncrement(modal);
        });

        // Listen for changes in Basic Salary, Percentage, or Amount
        $(document).on('input', '.basic_salary, .percentageInput, .amountInput', function () {
            let modal = $(this).closest('.modal');
            calculateIncrement(modal);
        });

    });
</script>
@endpush
