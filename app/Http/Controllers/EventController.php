<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Category;
use App\Models\CategoryEvent;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function myEvents()
    {
        $organiserId = Auth::user()->id;
        $events = Event::where('organiser_id', $organiserId)->get();

        return view('events', compact('events'));
    }

    public function displayEvents(){
        $events = Event::with('users')->get();

        return view('events', compact('events'));
    }

    public function createEvents()
    {
        $organiser = Auth::user()->id;
        $categories = Category::all();

        return view('organiser.createEvent', compact('organiser', 'categories'));
 
    }

    public function store(EventRequest $request)
    {
        $validated = $request->validated();
        Event::create($validated);

        return redirect()->route('organiser.organiser_dashboard');
    }

    public function updateEvents($id)
    {
        $events = Event::where('id', $id)->get();
        $categories = Category::all();

        return view('organiser.updateEvent', compact('events', 'categories'));
    }

    public function update(EventRequest $request, $id)
    {
        $validated = $request->validated();
        $updateEvent = Event::where('id', $id);
        $updateEvent->update($validated);

        return redirect()->route('organiser.organiser_dashboard'); 
    }

    public function deleteEvent($id)
    {
        $events = Event::where('id', $id);
        $events->delete();

        return redirect()->back();
    }

    public function eventsDetails($id){
        $events = Event::with('users')->with('categories')->where('id', $id)->get();

        return view('eventsDetails', compact('events'));
    }

}
