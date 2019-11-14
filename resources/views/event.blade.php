@extends('layout')

@section('content')
        <p>Produit: {{ $event->event_name }}</p>
        <p>Description: {{ $event->event_description }}</p>
        <p>Prix: {{ $event->event_price }}€</p>
        @foreach ($event->image()->get() as $image)
        <img src="/storage/image/{{ $image->image_url }}" alt="">
        @endforeach
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
                <button name="submit" type="submit" class="btn btn-primary" style="background: #17a2b8">Supprimer cet évènementt</button>
            </div>
        </div>
    </form>
    @endif
        @if($inscription)
        <form action="{{ route('inscription', $event->event_id) }}" method="POST">
            @csrf
            <input type="submit" value="S'inscrire" name="inscription" id="inscription_button" />
        </form>
    @else
            <form action="{{ route('deinscription', $event->event_id) }}" method="POST">
                @csrf
                <input type="submit" value="Se désinscrire" name="inscription" id="inscription_button" />
            </form>
    @endif
@endsection
