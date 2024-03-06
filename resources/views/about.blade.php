@extends('layouts.app')

@section('content')
<div class="about" id="about" style="margin-top:50px;">
    <h2 class="lang" key="about">{{ __('app.about') }}</h2>
    <div class="container">
      <img src="{{ asset('images/static_img/about.jpg') }}" alt="">
      <h5 class="lang" key="about_text">{{ __('app.about_text') }}</h5>
    </div>
  </div>

@endsection
