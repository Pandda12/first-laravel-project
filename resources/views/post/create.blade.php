@extends('layouts.main')
@section('content')
    <form method="POST" action="{{ route( 'post.store' ) }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Email address</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" placeholder="Content" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="img" class="form-control" id="image" placeholder="Image">
        </div>
        <div class="mb-3">
            <label for="category">Category</label>
            <select class="form-select" id="category" name="category_id">
                @foreach( $categories as $category )
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
