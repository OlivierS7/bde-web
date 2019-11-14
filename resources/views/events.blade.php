@extends('layout')
@section('link')
@endsection

@section('content')

        @if(Session::get('status') == "Membre BDE")
        <form action="insertEvent" method="get">
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary" style="background: #17a2b8">Créer un évènement</button>
                </div>
            </div>
        </form>
        @endif
        @foreach($events as $event)
            <p>Evènement: {{ $event->event_name }}</p>
            <p>Description: {{ $event->event_description }}</p>
            <p>Date: {{ $event->event_date }}</p>
            @if (($event->image->first()))
            <img src="/storage/image/{{ $event->image->first()->image_url }}" alt="">
            @endif
            <form action="/events/{{ $event->event_id }}" method="GET">
            @csrf
                <input type="submit" value="Plus sur cet évènement" name="event_id" id="event_button" />
            </form>
        @endforeach
@endsection
