@extends('layouts.master')

@section('title')
    Contact
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ URL::secure('src/css/form.css') }}" type="text/css" /> 
@endsection

@section('content')
    @include('includes.info-box')
    <form action="" method="post" id="contact-form">
        <div class="input-group">
            <label for="name">Your Name</label>
            <input type="text" name="name" id="name" placeholder="Your Name" />
        </div>
        <div class="input-group">
            <label for="name">Your E-Mail</label>
            <input type="text" name="email" id="email" placeholder="E-Mail" />
        </div>
        <div class="input-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" placeholder="Subject" />
        </div>
        <div class="input-group">
            <label for="message">Your Message</label>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
        </div>
        <button class="btn" type="submit">Send Message</button>
        <input type="hidden" value="{{ Session::token() }}" name="_token" />
    </form>
@endsection