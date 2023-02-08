<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class qrconfirmbookingController extends Controller
{
    public function getBookingsFromQR(Request $request)
    {
        // get items from database

       

        $qr = $request->input('user_id');
        // dd($qr);

        $bookings = DB::table('bookings')->where('user_id', $qr)->get();
        $doneStatus = true;

        return view('qrconfirmbooking', ['bookings' => $bookings, 'doneStatus' => $doneStatus]);
    }
}
