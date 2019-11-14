<?php

namespace App\Http\Controllers;

use App\Event;
use App\Participant;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Image;
use stdClass;

use Symfony\Component\HttpKernel\Event\RequestEvent;
use function GuzzleHttp\json_decode;

class EventController extends Controller
{

    public function mainPage()
    {
        $events = Event::all();
        return view('events', ['events' => $events]);
    }

    public function linkImageToEvent($images, $events){
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
        $event = Event::find($id);
;       $participate = Participant::where('user_id', session()->get('id'))->where('event_id', $id)->first();
        $like = Like::where('user_id', session()->get('id'))->where('event_id', $id)->first();
        if($participate){
            if($like){
            return view('event', ['event' => $event, 'inscription' => false, 'like' => false]);
        }
        return view('event', ['event' => $event, 'inscription' => false, 'like' => true]);
        } else {
            if($like){
                return view('event', ['event' => $event, 'inscription' => true, 'like' => false]);
            }
        return view('event', ['event' => $event, 'inscription' => true, 'like' => true]);
    }
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

    public function deleteEvent(Request $request){
        $id = array();
        $idProduct = request('id_event');
        $idImage = json_decode(request('id_image'));
        foreach($idImage as $image){
            array_push($id, $image->image_id);
        }
        $image = Image::whereIn('image_id', $id)->delete();
        $event = Event::where('event_id', '=', $idProduct)->delete();
        return redirect('/events');
    }

    public function inscription($event_id){
        $user_id=session()->get('id');
        Participant::create(compact('user_id', 'event_id'));
        return back();
    }

    public function deinscription($event_id){
        $user_id=session()->get('id');
        Participant::where(compact('user_id', 'event_id'))->delete();
        return back();
    }

    public function like($event_id){
        $user_id=session()->get('id');
        Like::create(compact('user_id', 'event_id'));
        return back();
    }

    public function unlike($event_id){
        $user_id=session()->get('id');
        Like::where(compact('user_id', 'event_id'))->delete();
        return back();
    }

    public function comment(Request $request){
        $user_id=session()->get('id');
        $event_id = 0;
        Comment::create(compact('user_id', 'event_id', 'comment_content'));
        return redirect('events');
    }
}
