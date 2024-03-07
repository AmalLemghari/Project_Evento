<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganiserController extends Controller
{
    public function organiser_dashboard(){
        $organiser = Auth::user()->id;
        $events = Event::with('users')->where('organiser_id', $organiser)->orderBy('updated_at', 'desc')->get();
        $event = Event::all();
        foreach ($event as $even) {
            $totalReservations = $even->reservations()->count();
            $confirmedReservations = $even->reservations()->where('status', 'Confirmee')->count();

        }
        // dd($totalReservations);

        return view('organiser.organiser_dashboard', compact('event', 'events', 'totalReservations', 'confirmedReservations'));
    }
}
