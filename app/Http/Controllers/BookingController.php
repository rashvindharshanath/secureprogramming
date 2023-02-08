<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookingController extends Controller
{
   

    public function index()
    {
        $bookings = DB::table('bookings')->get();
        // get items from database
        $items = DB::table('items')->get();
        $item_picture = DB::table('items')->select('picture_link');
        $house_number = DB::table('complaints')->select('house_no_block')->where('name','=','auth()->user()->name');


        return view('bookings', ['bookings' => $bookings, 'items' => $items, 'item_picture' => $item_picture, 'house_number' => $house_number]);
    }

    public function confirm(Request $request) {
        // delete the booking from the database
        $booking_id = $request->input('booking_id');
        DB::table('bookings')->where('id', $booking_id)->delete();

        return view('confirmBookingSuccess');
    }
}

?>