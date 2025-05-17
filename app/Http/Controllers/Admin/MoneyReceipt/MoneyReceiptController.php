<?php

namespace App\Http\Controllers\Admin\MoneyReceipt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MoneyReceiptController extends Controller
{
    public function createMr()
    {
        return view("admin.money-receipt.create-mr");
    }
    public function approvedMr()
    {
        return view("admin.money-receipt.approved-mr");
    }
}
