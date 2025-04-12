@extends('layouts.app')

@section('content')
    <div class="artist-details">
        <h1>{{ $artist['user']['name'] }}</h1>
        <h1>{{ $artist['user']['email'] }}</h1>
        {{-- <p><strong>Genre:</strong> {{ $artist->genre }}</p>
        <p><strong>Biography:</strong> {{ $artist->biography }}</p>
        <p><strong>Website:</strong> <a href="{{ $artist->website }}" target="_blank">{{ $artist->website }}</a></p>
        <p><strong>Social Media:</strong></p>
        <ul>
            @foreach ($artist->social_links as $platform => $link)
                <li><a href="{{ $link }}" target="_blank">{{ ucfirst($platform) }}</a></li>
            @endforeach
        </ul> --}}
    </div>
@endsection
