<?php

namespace App\Http\Controllers\Admin\MoneyReceipt;

use App\Http\Controllers\Controller;
use App\Models\Admin\Employee\EmployeePersonalInformation;
use Illuminate\Http\Request;
use App\Models\PlotBooking;

class MoneyReceiptController extends Controller
{
    public function createMr()
    {
        $customers = EmployeePersonalInformation::select('id', 'name')->get();

        return view("admin.money-receipt.create-mr", compact("customers"));
    }
    public function approvedMr()
    {
        return view("admin.money-receipt.approved-mr");
    }
    public function bookingPlotByCustomerId($customerId)
    {
        $bookings = PlotBooking::where('customer_id', $customerId)->get();
        return response()->json($bookings);
    }
}
