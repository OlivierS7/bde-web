<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Image;
use stdClass;

use function GuzzleHttp\json_decode;

class EventController extends Controller
{

    public function mainPage()
    {
       // $images = new stdClass;
        $events = Event::all();
    // foreach($events as $event)
    // {
    //     $id = $event->event_id;
    //     $images->$id = $this->isImage($event->event_id);
        
    // }
    //$events = $this->linkImageToEvent($images ,$events);
        return view('events', ['events' => $events]);
    }

    public function linkImageToEvent($images, $events){
        //dd($events);
        foreach($events as $event){
            $event->image = null;
            foreach($images as $image){
                dd($image->event_id);
                if($event->event_id == $image->event_id){
                    $event->image = $image;
                }
            }
        }
        return $events;
    }

    public function getOneEvent($id)
    {
        //$images = new stdClass;
        $event = Event::find($id);
        //$id = $event->event_id;
        //$images->$id = $this->isImage($event->event_id);
        //$event = json_encode($event);
        //$event = '[' . $event . ']';
        //$event = json_decode($event);
        //$event = $this->linkImageToEvent($images ,$event);
        //$event = json_encode($event);
        //$event = str_replace('[', ' ', $event);
        //$event = str_replace(']', ' ', $event);
        //$event = json_decode($event);
        return view('event', ['event' => $event]);
    }

    public function insertEvent(Request $request)
    {
        $name = request('event_name');
        $description = request('event_description');
        $price = request('event_price');
        $image = request('event_image');
        $date = request('event_date');
        if ($this->validateRequest()) {
            $imageName = $request->file('event_image');
            $events = DB::table('events')->insert($request->only(['event_name', 'event_date', 'event_price', 'event_description']) + ['user_id' => session('id')]);
            $event_id = DB::table('events')->max('event_id');
            $imageId = Image::storeImageEvent($image, $event_id);
            return redirect('/events');
        } else {
            return back()->with('warning','Champ');
        }
    }

    private function validateRequest()
    {
        return request()->validate([
            'event_name' => 'required',
        ]);
    }

    public function isImage($event_id){
        $images = Image::where('event_id', 3)->get();
        return $images;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Event $event)
    {
        //
    }

    public function edit(Event $event)
    {
        //
    }

    public function update(Request $request, Event $event)
    {
        //
    }

    public function destroy(Event $event)
    {
        //
    }
}
