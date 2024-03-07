<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function applyForTheEvent(ReservationRequest $request)
    {
        $validated = $request->validated();
        Event::create($validated);

        return redirect()->back();
    }

    public function apply($id){
        $user_id = Auth::User()->id;
        $event_id = $id;

        return view('auth.applyEvent', compact('user_id', 'event_id'));
    }
}
