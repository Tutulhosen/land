<?php

namespace App\Http\Controllers\Admin\MoneyReceipt;

use App\Http\Controllers\Controller;
use App\Models\Admin\Employee\EmployeePersonalInformation;
use App\Models\Admin\SystemConfiguration\ProjectList;
use Illuminate\Http\Request;
use App\Models\PlotBooking;
use Illuminate\Support\Facades\DB;

class MoneyReceiptController extends Controller
{
    public function createMr()
    {
        $customers = EmployeePersonalInformation::select('id', 'name')->get();
        $project_lists = ProjectList::select('id', 'name')->get();

        $lastId = DB::table('money_recipts')->max('id');

        $nextId = $lastId ? $lastId + 1 : 1;

        $serialNo = 'MR-' . $nextId;

        return view("admin.money-receipt.create-mr", compact("customers", "serialNo", "project_lists"));
    }
    public function approvedMr()
    {
        $moneyReceipts = DB::table('money_recipts')
            ->where('is_deleted', false)
            ->join('customers', 'money_recipts.customer_id', '=', 'customers.id')
            ->select(
                'money_recipts.*',
                'customers.name as name',
                'customers.number as phone',
                'customers.email as email',
                'customers.designation as designation'
            )
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view("admin.money-receipt.approved-mr", compact('moneyReceipts'));
    }
    public function bookingPlotByCustomerId($customerId)
    {
        $bookings = PlotBooking::with('plot_details.road.sector')
            ->where('customer_id', $customerId)
            ->get();

        return response()->json($bookings);
    }
    public function plotBookingById($id)
    {
        $booking = PlotBooking::find($id);

        $booking_amount = DB::table('money_recipts')
            ->where('payment_type', 3)
            ->where('booking_id', $id)
            ->select('amount')
            ->first();
        $down_payment = DB::table('money_recipts')
            ->where('payment_type', 1)
            ->where('booking_id', $id)
            ->select('amount')
            ->first();
        return response()->json([
            'booking' => $booking,
            'booking_amount' => $booking_amount ?? 0,
            'down_payment' => $down_payment ?? 0
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reg_date' => 'required|date',
            'customer_id' => 'required|integer',
            'project_id' => 'required|integer',
            'booking_id' => 'required|integer',
            'mr_code' => 'required|string',
            'payment_type' => 'required|string',
            'payment_mode' => 'required|string',
            'installment_no' => 'nullable|string',
            'termsAndCondition' => 'nullable|string',
            'note' => 'nullable|string',
            'start_month' => 'nullable|string',
            'end_month' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'branch' => 'nullable|string',
            'amount' => 'required|numeric',
            'cheque_number' => 'nullable|string',
            'deposit_to' => 'nullable|integer',
            'cheque_date' => 'nullable|date',
        ]);

        $data = [
            'reg_date' => $validated['reg_date'],
            'customer_id' => $validated['customer_id'],
            'project_id' => $validated['project_id'],
            'booking_id' => $validated['booking_id'],
            'mr_code' => $validated['mr_code'],
            'payment_type' => $validated['payment_type'],
            'payment_mode' => $validated['payment_mode'],
            'installment_no' => $validated['installment_no'] ?? null,
            'installment_month' => $validated['start_month'] ?? null,
            'installment_month_to' => $validated['end_month'] ?? null,
            'bank_name' => $validated['bank_name'] ?? null,
            'branch' => $validated['branch'] ?? null,
            'amount' => $validated['amount'],
            'cheque_number' => $validated['cheque_number'] ?? null,
            'deposit_to' => $validated['deposit_to'] ?? null,
            'cheque_date' => $validated['cheque_date'] ?? null,
            'termsAndCondition' => $validated['termsAndCondition'] ?? null,
            'note' => $validated['note'] ?? null,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('money_recipts')->insert($data);

        return redirect()->back()->with('success', 'Money Receipt created successfully.');
    }

    public function edit($id)
    {
        $customers = EmployeePersonalInformation::select('id', 'name')->get();
        $moneyReceipt = DB::table('money_recipts')->where("id", $id)
            ->first();
        $project_lists = ProjectList::select('id', 'name')->get();


        // dd($moneyReceipts);

        return view("admin.money-receipt.edit-mr", compact('moneyReceipt', 'customers', 'project_lists'));
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'project_id' => 'required|string',
            'mr_code' => 'required|string',
            'reg_date' => 'required|date',
            'customer_id' => 'required|integer',
            'booking_id' => 'required|integer',
            'payment_mode' => 'required|string',
            'payment_type' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $data = [
            'project_id' => $request->project_id,
            'mr_code' => $request->mr_code,
            'reg_date' => $request->reg_date,
            'customer_id' => $request->customer_id,
            'booking_id' => $request->booking_id,
            'payment_mode' => $request->payment_mode,
            'bank_name' => $request->bank_name,
            'cheque_number' => $request->cheque_number,
            'cheque_date' => $request->cheque_date,
            'payment_type' => $request->payment_type,
            'installment_no' => $request->installment_no,
            'installment_month' => $request->start_month,
            'installment_month_to' => $request->end_month,
            'amount' => $request->amount,
            'termsAndCondition' => $request->termsAndCondition,
            'note' => $request->note,
            'updated_at' => now(),
        ];

        DB::table('money_recipts')->where('id', $id)->update($data);

        return redirect()->route('money.receipt.approvedMr')->with('success', 'Money receipt updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('money_recipts')->where('id', $id)->update([
            'is_deleted' => 1
        ]);
        return response()->json([
            'success' => true,
        ]);
    }
}
