<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\Repository\Event\EventEloquentRepository;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventRepository;
    public function __construct(EventEloquentRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index()
    {
        $events = $this->eventRepository->getAll();

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
        $data = $request->all();
        $events = $this->eventRepository->create($data);
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
        $event = $this->eventRepository->find($id);

        return view('Admin.Event.edit', [
            'event' => $event
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $event = $this->eventRepository->update($data, $id);
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
        $this->eventRepository->delete($id);

        return redirect('/admin/home/event')->with('mess', 'SUCCESS!!!');
    }
}


