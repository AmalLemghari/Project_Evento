<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin_dashboard()
    {
        // $admin = Auth::user()->id;
        // $users = User::all();
        // $events = Event::where('status', 'Available')->where('validation', 'Validated')->get();
        
        // foreach ($users as $user){
        //     $totalUsers = $user->count();
        // }
        
        // foreach ($events as $event) {
        //     $reservationsCount = Reservation::where('event_id', $event->id)->count();
        //     // dd($reservationsCount);
        //     foreach ($reservationsCount as $reservationCount){
        //         $total = $event->available_seats - $reservationCount;
        //     }
        //     $totalEvents = $event->count();
        //     $totalReservations = $event->reservations()->count();
        //     $confirmedReservations = $event->reservations()->where('status', 'Confirmee')->count();
        // }
        // dd($totalReservations);

        // return view('admin.admin_dashboard', compact('totalUsers', 'totalEvents', 'totalReservations', 'confirmedReservations'));
        return view('admin.admin_dashboard');

    }
}
