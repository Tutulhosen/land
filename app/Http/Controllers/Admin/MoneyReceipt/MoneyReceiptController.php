<?php

namespace App\Http\Controllers\Admin\MoneyReceipt;

use App\Http\Controllers\Controller;
use App\Models\Admin\Employee\EmployeePersonalInformation;
use Illuminate\Http\Request;
use App\Models\PlotBooking;
use Illuminate\Support\Facades\DB;

class MoneyReceiptController extends Controller
{
    public function createMr()
    {
        $customers = EmployeePersonalInformation::select('id', 'name')->get();

        $lastId = DB::table('money_recipts')->max('id');

        $nextId = $lastId ? $lastId + 1 : 1;

        $serialNo = 'MR-' . $nextId;

        return view("admin.money-receipt.create-mr", compact("customers", "serialNo"));
    }
    public function approvedMr()
    {
        return view("admin.money-receipt.approved-mr");
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
}
