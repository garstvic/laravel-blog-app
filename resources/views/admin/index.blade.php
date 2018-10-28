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
                    <li><a href="{{ route('admin.index') }}" class="btn">Show all Posts</a></li>
                </nav>
            </header>
            <section>
                <ul>
                    <!-- If no Posts... -->
                    @if(true)
                        <li>No posts</li>
                    <!-- If Posts -->
                    @else
                        <li>
                            <article>
                                <div class="post-info">
                                    <h3>Post Title</h3>
                                    <span class="info">Post Author</span>
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