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

        // সর্বশেষ ID বের করুন
        $lastId = DB::table('money_recipts')->max('id');

        // নতুন ID
        $nextId = $lastId ? $lastId + 1 : 1;

        // সিরিয়াল নাম্বার তৈরি করুন
        $serialNo = 'serialno-' . $nextId;

        return view("admin.money-receipt.create-mr", compact("customers", "serialNo"));
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
