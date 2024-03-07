<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $totalUsers = User::count();
        $totalEvents = Event::count();
        $totalReservations = Reservation::count();
        $confirmedReservations = Reservation::where('status', 'Confirmee')->count();

        return view('organiser.organiser_dashboard', compact('totalUsers', 'totalEvents', 'totalReservations', 'confirmedReservations'));
    }
}
