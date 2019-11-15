@extends('layout')
@section('link')
    <link rel="stylesheet" href="{{asset('css/events.css')}}"/>
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
        <div class="row justify-content-between event_resp">
            @foreach($events as $event)
                <div class="col-2 mr-1 event_resp1">
                    <div class="row d-flex flex-column justify-content-center event_border">


                    <div class="col-12">
                        <p><strong>{{ $event->event_name }}</strong></p>
                        <p>{{ $event->event_description }}</p>
                        <p>Le : {{ $event->event_date }}</p>
                    </div>
                    <div class="col-12">
                        <div class="shadow rounded">
                            @if (($event->image->first()))
                                <img src="/storage/image/{{ $event->image->first()->image_url }}" alt="">
                            @endif
                        </div>
                    </div>
                        <div class="col-8 offset-2">
                            <form action="/events/{{ $event->event_id }}" method="GET">
                                @csrf
                                <input class="form-control mt-1 mb-1 more" type="submit" value="Plus..." name="event_id" id="event_button" />
                            </form>
                        </div>




                    </div>
                </div>
            @endforeach
        </div>


@endsection

@section('script')
    <script src="{{asset('js/events.js')}}"></script>
@endsection
