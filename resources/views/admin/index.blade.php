@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::secure('src/css/modal.css') }}" type="text/css" />
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <div class="card">
            <header>
                <nav>
                    <li><a href="{{ route('admin.blog.create_post') }}" class="btn">New Post</a></li>
                    <li><a href="{{ route('admin.blog.index') }}" class="btn">Show all Posts</a></li>
                </nav>
            </header>
            <section>
                <ul>
                    @if(count($posts) == 0)
                        <li>No posts</li>
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
                                                <li><a href="{{ route('admin.blog.post', ['post_id' => $post->id, 'side' => 'admin']) }}">View Post</a></li>
                                                <li><a href="{{ route('admin.blog.post.edit', ['post_id' => $post->id]) }}">Edit</a></li>
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
        </div>
        
        <div class="card">
            <header>
                <nav>
                    <li><a href="{{ route('admin.index') }}" class="btn">Show all Messages</a></li>
                </nav>
            </header>
            <section>
                <ul>
                    <!-- If no Messages... -->
                    @if(true)
                        <li>No Messages!</li>
                    <!-- If Messages -->
                    @else
                        <li>
                            <article data-message="Body" data-id="ID">
                                <div class="message-info">
                                    <h3>Message Subject</h3>
                                    <span class="info">Sender: ...</span>
                                </div>
                                <div class="edit">
                                    <nav>
                                        <ul>
                                            <li><a href="{{ route('admin.index') }}">View Message</a></li>
                                            <li><a href="{{ route('admin.index') }}" class="danger">Delete</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </article>
                        </li>
                    @endif
                </ul>
            </section>
        </div>        
    </div>
    <div class="modal" id="contact-message-info">
        <button class="btn" id="modal-close">Close</button>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var token = "{{ Session::token() }}";
    </script>
    <script type="text/javascript" src="{{ URL::secure('src/js/modal.js') }}"></script>    
    <script type="text/javascript" src="{{ URL::secure('src/js/contact_messages.js') }}"></script>
@endsection
