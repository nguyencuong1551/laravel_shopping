<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('Admin.Event.home', [
            'events' => $events
        ]);
    }

    public function create()
    {

        return view('Admin.Event.create');
    }

    public function store(Request $request)
    {
        $events = new Event();
        $events->nameEvent = $request->get('name');
        $events->percent = $request->get('percent');
        $events->imageEvent = $request->get('image');
        $mess = "";
        if ($events->save()) {
            $mess = "{{ __('SUCCESS!!!') }}";
        }

        return view('Admin.Event.create', [
            'mess' => $mess
        ]);
    }

    public function edit($id)
    {
        $event = Event::find($id);

        return view('Admin.Event.edit', [
            'event' => $event
        ]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->nameEvent = $request->get('name');
        $event->percent = $request->get('percent');
        $event->imageEvent = $request->get('image');
        $mess = "";
        if ($event->save()) {
            $mess = "{{ __('SUCCESS!!!') }}";
        }

        return view('Admin.Event.edit', [
            'mess' => $mess,
            'event' => $event
        ]);
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('/admin/home/event')->with('mess', 'SUCCESS!!!');
    }
}
