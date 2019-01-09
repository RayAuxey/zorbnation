<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;
use App\Http\Resources\Event as EventResource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('attends', 'desc')->paginate(9);

        return EventResource::collection($events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Getting the image
        $fileName = 'zorb.jpg';
        if ($request->image) {
            $exploded = explode(',', $request->image);
            $decoded = base64_decode($exploded[1]);

            if (str_contains($exploded[0], 'jpeg'))
                $extension = 'jpg';
            else
                $extension = 'png';
            
            $fileName = str_random().'.'.$extension;
            $path = public_path().'/storage/images/'.$fileName;

            file_put_contents($path, $decoded);
        }
        
        $event = $request->isMethod('put') ? Event::findOrFail($request->event_id) : new Event;

        // $event->id = $request->input('event_id');
        $event->user = $request->input('user');
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->location = $request->input('location');
        $event->date = $request->input('date');
        $event->image = $fileName;

        if ($event->save()) {
            return new EventResource($event);
        }

    }

    public function attend(Request $request) {
        $event = Event::findOrFail($request->event_id);
        $event->attends = $event->attends + 1;
        if ($event->save()) {
            return new EventResource($event);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get a single resource
        $event = Event::findOrFail($id);

        return new EventResource($event);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->delete()) {
            return new EVentResource($event);
        }
        
    }
}
