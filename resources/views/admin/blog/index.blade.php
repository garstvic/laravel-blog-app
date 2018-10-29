@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::secure('src/css/form.css') }}" type="text/css" />
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <section id="post-admin">
            <a href="{{ route('admin.blog.create_post') }}" class="btn">New Post</a>
        </section>
        <section class="list">
            <ul>
                @if(count($posts) == 0)
                    <li>No Posts!</li>
                @else
                    @foreach($posts as $post)
                        <li>
                            <article>
                                <div class="post-info">
                                    <h3>{{ $post->title }}</h3>
                                    <span class="info">{{ $post->author }} | {{ $post->created_at }}</span>
                                </div>
                                <div class="edit">
                                    <nav>
                                        <ul>
                                            <li><a href="{{ route('admin.index') }}">View Post</a></li>
                                            <li><a href="{{ route('admin.index') }}">Edit</a></li>
                                            <li><a href="{{ route('admin.index') }}" class="danger">Delete</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </article>
                        </li>
                    @endforeach
                @endif
            </ul>
        </section>
        @if($posts->lastPage() > 1)
            <section class="pagination">
                @if($posts->currentPage() !== 1)
                    <a href="{{ $posts->previousPageUrl() }}"><i class="fa fa-caret-left"></i></a>
                @endif
                @if($posts->currentPage() !== $posts->lastPage())
                    <a href="{{ $posts->nextPageUrl() }}"><i class="fa fa-caret-right"></i></a>
                @endif
            </section>
        @endif
    </div>
@endsection