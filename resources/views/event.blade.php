@extends('layout')

@section('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/event_simple.css')}}" />
@endsection

@section('content')
    <div class="container">
        <div class="event_border">
            <div class="col">
                    <p><strong>{{ $event->event_name }}</strong></p>
            </div>
            <div class="col">
                <div class="row eve_resp">
                    <div class="col-3 eve_resp1">
                        <div class="desc_border eve_resp3">
                            <p>{{ $event->event_description }}</p>
                        </div>

                    </div>
                    <div class="col-6">
                        @foreach ($event->image()->get() as $image)
                            <img src="/storage/image/{{ $image->image_url }}" alt="">
                        @endforeach
                            <p><strong>Prix: {{ $event->event_price }}€</strong> </p>
                    </div>
                </div>

            </div>

        </div>
        @if($like)
            <form action="{{ route('like', $event->event_id) }}" method="GET">
                @csrf
                <button style="font-size:24px"><i class="fa fa-heart-o" name="like"></i> {{ $totalLikes }}</button>
            </form>
        @else
    </div>

</form>
@if(Session::get('status') == "Membre BDE")
<form action="{{ route('deleteEvent') }}" method="POST">
    @csrf
    @foreach ($event->image()->get() as $image)
    <input type="hidden" name="id_image" value="{{ $event->image()->get()}}">
    @endforeach
    <input type="hidden" name="id_event" value={{ $event->event_id }}>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary" style="background: #17a2b8">Supprimer cet
                évènement</button>
        </div>
    </div>
</form>
@endif
@if(Session::get('id'))
@if($inscription && !$isPassed)
<form action="{{ route('inscription', $event->event_id) }}" method="GET">
    @csrf
    <input type="submit" value="S'inscrire" name="inscription" id="inscription_button" />
</form>
@elseif(!$isPassed)
<form action="{{ route('deinscription', $event->event_id) }}" method="GET">
    @csrf
    <input type="submit" value="Se désinscrire" name="inscription" id="inscription_button" />
</form>
@endif

<form action="{{ route('unlike', $event->event_id) }}" method="GET">
    @csrf
    <div class='button' id='heart'>
    <button style="font-size:24px;color:red"><i class="fa fa-heart" name="unlike"></i> {{ $totalLikes }}</button>
    </div>
</form>
@endif
@if($isPassed && !$inscription)
<form action="{{ route('insertComment', $event->event_id) }}" method="POST">
    @csrf
    <div class='button'>
        <input type="submit" value="Comment" name="Laisser un commentaire" id="comment_button" />
    </div>
</form>
    @endif
@endif
    @foreach($comments as $key=>$comment)
        <p>{{ $key+1 }}-Commentaire: {{ $comment->comment_content }}
        @if($comment->image)
        <img src="/storage/image/{{ $comment->image->image_url }}"/>
        @endif
        </p>
        @if(Session::get('status') == "Membre BDE")
        <form action="{{ route('deleteComment', $comment->comment_id) }}" method="POST">
            @csrf
            <input type="submit" value="Supprimer ce commentaire" name="comment" id="inscription_button" />
        </form>
        @endif
    @endforeach
@endsection
@section('script')
    <script src="{{asset('js/event_simple.js')}}"></script>
@endsection
<script>
    import LineNumber from "../../vendor/facade/ignition/resources/js/components/Shared/LineNumber";
    export default {
        components: {LineNumber}
    }
</script>
