@extends('layouts.main')
@section('content')
    <div>
        Main Page
    </div>
    <a href="{{ route('post.index')  }}">Posts</a>
@endsection
