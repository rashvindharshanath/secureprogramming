<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        return redirect('dashboard');
    }

    public function index()
    {
        if (Auth::user()->role == 'admin') {

            // get all complaints, limit to 6
            $complaints = DB::table('complaints')->limit(6)->get();

            // get all bookings, limit to 6
            $bookings = DB::table('bookings')->limit(6)->get();

            $bookings_count = DB::table('bookings')->count();
            $items_count = DB::table('items')->count();
            $complaints_count = DB::table('complaints')->count();
            $users_count = DB::table('users')->count();

            return view('dashboard', ['complaints' => $complaints, 'bookings' => $bookings, 'bookings_count' => $bookings_count, 'items_count' => $items_count, 'complaints_count' => $complaints_count, 'users_count' => $users_count]);
        } else {
            // get complaints and booking data related to the user
            $complaints = DB::table('complaints')->get()->where('user_id', '=', Auth::user()->id);
            $bookings = DB::table('bookings')->get()->where('user_id', '=', Auth::user()->email);
            $bookings_count = DB::table('bookings')->where('user_id', '=', Auth::user()->email)->count();
            $items_count = DB::table('items')->count();
            $complaints_count = DB::table('complaints')->where('user_id', '=', Auth::user()->id)->count();

            return view('dashboard', ['complaints' => $complaints, 'bookings' => $bookings, 'bookings_count' => $bookings_count, 'items_count' => $items_count, 'complaints_count' => $complaints_count]);
        }
    }


    public function confirmComplaint(Request $request)
    {

        //delete from database
        // dd($request->id);
        DB::table('complaints')->where('id', $request->id)->delete();

        return redirect()->route('dashboard.index');
    }
}
