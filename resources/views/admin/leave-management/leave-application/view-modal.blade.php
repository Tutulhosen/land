<div id="leave-application-view-{{ $leave->id }}" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Leave Action</strong></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('leave-application.updateStatus', $leave->id) }}" method="POST" id="leaveStatusForm">
                @csrf
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Employee</th>
                                <td>
                                    {{ $leave->employee->salutations->name }} {{ $leave->employee->first_name }} {{ $leave->employee->last_name }}
                                    <br />{{ $leave->employee->officialInformation->designation->designation_name ?? 'N/A' }}
                                    <br />{{ $leave->employee->officialInformation->department->department_name ?? 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Leave Type</th>
                                <td>
                                    {{ $leave->leaveType->leave_name }}
                                    <br />{{ $leave->leaveType?->leaveDuration?->name ?? 'N/A' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Applied On</th>
                                <td>
                                    {{ $leave->created_at->format('d M Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th>From Date</th>
                                <td>{{ $leave->from_date }}</td>
                            </tr>
                            <tr>
                                <th>To Date</th>
                                <td>{{ $leave->to_date }}</td>
                            </tr>
                            <tr>
                                <th>Number of Days</th>
                                <td>
                                    {{ \Carbon\Carbon::parse($leave->from_date)->diffInDays(\Carbon\Carbon::parse($leave->to_date)) + 1 }} Days
                                </td>
                            </tr>
                            <tr>
                                <th>Leave Reason</th>
                                <td>{{ $leave->leave_reason }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <div  class="badge {{ $leave->status == 'approved' ? 'badge-success' : ($leave->status == 'rejected' ? 'badge-danger' : 'badge-warning') }}">
                                        {{ ucfirst($leave->status) }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="from-group mb-3">
                        <label for="reason" class="form-label">Reason</label>
                        <textarea type="text" name="reason" id="reason" class="form-control" placeholder="Enter Reason"></textarea>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <div class="hstack gap-2 justify-content-center pt-4 pb-3" style="{{ in_array($leave->status, ['approved', 'rejected']) ? 'display: none;' : '' }}">

                        @method('PUT') <!-- Use PUT method for update -->
                        <input type="hidden" name="status" id="leaveStatus">
                        <button type="button" class="cancel-button-1 bg-success update-status" data-status="approved">
                            <i class="bx bx-check-shield bx-flashing"></i> Approve
                        </button>

                            <button type="button" class="submit-button-1 bg-danger update-status" data-status="rejected">
                            <i class="bx bx-message-square-x bx-tada"></i> Reject
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.update-status').forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('leaveStatus').value = this.getAttribute('data-status');
            document.getElementById('leaveStatusForm').submit();
        });
    });
</script>
