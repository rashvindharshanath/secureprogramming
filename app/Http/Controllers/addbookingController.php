<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class addbookingController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all()
        // );

        DB::table('bookings')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'house_no_block' => $request->house_no_block,
            'booking_date' => $request->booking_date,
            'booked_item' => $request->booked_item,
            'time' => $request->time,
            'user_id' => $request->user_id,
        ]);

        $item_picture = DB::table('items')->select('picture_link');
        $house_number = DB::table('complaints')->select('house_no_block')->where('name','=','auth()->user()->name');
        $generateQRemail = $request->user_id;
        $statusSuccess = true;

        return view('addbookingSuccess', ['item_picture' => $item_picture, 'house_number' => $house_number], compact('statusSuccess', 'generateQRemail'));
        
    }

    // pull data from database
    public function index()
    
    {
        $generateQRemail = null;
        $statusSuccess = false;

        return view('addbooking', compact('statusSuccess', 'generateQRemail'));

        // $addbookings = DB::table('bookings')->get();
        // return view('addbooking', ['addbookings' => $addbookings], compact('statusSuccess', 'generateQRemail'));
    }

}