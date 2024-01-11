@extends('layouts.main')
@section('content')
    <div class="m-3">
        <a class="btn btn-primary" href="{{ route('post.create') }}">Create Post</a>
    </div>
    @foreach( $posts as $post )
        <p><a href="{{ route('post.show', $post->id) }}">{{$post->id}}. {{ $post->title }}</a></p>
    @endforeach
    <div>
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection
