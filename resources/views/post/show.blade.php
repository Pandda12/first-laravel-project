@extends('layouts.main')
@section('content')
    <p> {{$post->id}}. {{ $post->title }}</p>
    <p> {{$post->content }}</p>
    <p>Category: {{$post->category->title }}</p>

    <form action="{{ route('post.delete', $post->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete">
    </form>
    <p><a class="btn btn-success" href="{{ route('post.edit', $post->id) }}">Update</a></p>
    <p><a class="btn btn-primary" href="{{ route('post.index') }}">Go Back</a></p>
@endsection
