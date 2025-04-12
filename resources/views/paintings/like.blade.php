@foreach ($likeArtworks as $painting)
    <x-card :art="$painting" type='recent' />
@endforeach
