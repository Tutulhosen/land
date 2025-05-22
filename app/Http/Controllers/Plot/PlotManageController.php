<?php

namespace App\Http\Controllers\Plot;

use Illuminate\Http\Request;
use App\Models\Plot\PlotSale;
use App\Models\Plot\PlotBooking;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\SystemConfiguration\Plot;
use App\Models\Admin\SystemConfiguration\Agency;
use App\Models\Admin\SystemConfiguration\Project;

class PlotManageController extends Controller
{
    public function sale()
    {
        $plot_sale_datas = PlotSale::orderBy('id','desc')->paginate(15);
        
        return view('admin.plot.sale', compact('plot_sale_datas'));

    }
    
    public function sale_create()
    {
        $sectors=Project::orderBy('id', 'desc')->get();
        $agencies = Agency::orderBy('id', 'desc')->get();
        return view('admin.plot.sale_create', compact('sectors', 'agencies'));
    }

    public function sale_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date_of_sale' => 'required|date',
            'agency_id' => 'required|integer',
            'salesman_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'sale_type' => 'required|in:1,2',
            'note' => 'nullable|string',
            'plot_size' => 'required|numeric',
            'per_katha_rate' => 'required|numeric',
            'total_price' => 'required|numeric',
            'plot_id' => 'required|integer',
            'number_of_instalment' => 'required_if:sale_type,1|nullable|integer|min:1',
            'per_instalment_amount' => 'required_if:sale_type,1|nullable|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();

        try {
            // Insert into plot_bookings
            $booking = new PlotBooking();
            $booking->reg_date = $request->date_of_sale;
            $booking->customer_id = $request->customer_id;
            $booking->plot_id = $request->plot_id;
            $booking->agency_id = $request->agency_id;
            $booking->salesman_id = $request->salesman_id;
            $booking->is_installment = $request->sale_type;
            $booking->total_installment = $request->number_of_instalment;
            $booking->installment_amount = $request->per_instalment_amount;
            $booking->total_amount = $request->total_price;
            $booking->rate = $request->total_price;
            $booking->note = $request->note;
            $booking->save();

            // Update booking code like 001, 002, ...
            $booking->code = str_pad($booking->id, 3, '0', STR_PAD_LEFT);
            $booking->save();

            // Update plots table only after successful booking insert
            DB::table('plots')->where('id', $request->plot_id)->update(['plot_booking_status' => 1]);

            DB::commit();

            return response()->json([
                'message' => 'Plot booked successfully!'
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Something went wrong while booking the plot.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function plot_sale_destroy($id)
    {
        try {
            DB::beginTransaction(); 

            $plotSale = PlotSale::find($id);

            if (!$plotSale) {
                return response()->json(['success' => false, 'message' => 'Booking not found'], 404);
            }

            // Get the related plot_id before deleting
            $plotId = $plotSale->plot_id;

            // Delete the booking
            $plotSale->delete();

            // Update the related plot's booking status
            Plot::where('id', $plotId)->update(['plot_booking_status' => 0]);

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Booking deleted successfully']);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. ' . $e->getMessage(),
            ], 500);
        }
    }

}
