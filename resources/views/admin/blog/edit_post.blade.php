@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::secure('src/css/form.css') }}" type="text/css" />
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('admin.blog.post.update') }}" method="post">
            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" {{ $errors->has('title') ? 'class=has-error' : ''}} value="{{ Request::old('title') ? Request::old('title') : isset($post) ? $post->title : '' }}" >
            </div>
            <div class="input-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" {{ $errors->has('author') ? 'class=has-error' : '' }} value="{{ Request::old('author') ? Request::old('author') : isset($post) ? $post->author : '' }}" >
            </div>
            <div class="input-group">
                <label for="" name=""></label>
                <input type="text">
            </div>
            <div class="input-group">
                <label for="">Add Categories</label>
                <select name="select" id="category_select">
                    <!-- Foreach loop to output categories -->
                    <option value="Dummy Category" {{ strpos(Request::old('select'), 'Dummy Category') === 0 ? 'selected' : '' }}>Dummy category</option>
                    <option value="Fake Category" {{ strpos(Request::old('select'), 'Fake Category') === 0 ? 'selected' : '' }}>Fake category</option>
                </select>
                <button class="btn">Add Category</button>
                <div class="added-categories">
                    <ul></ul>
                </div>
                <input type="hidden" name="categories" id="categories">
            </div>
            <div class="input-group">
                <label for="Body">Body</label>
                <textarea name="body" id="body" rows="12" {{ $errors->has('body') ? 'class=has-error' : '' }} >{{ Request::old('body') ? Request::old('body') : isset($post) ? $post->body : '' }}</textarea>
            </div>
            <button type="submit" class="btn">Save Post</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ URL::secure('src/js/posts.js') }}"></script>
@endsection