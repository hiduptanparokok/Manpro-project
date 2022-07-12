@extends('layouts.app')

@section('content')

<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1 style="color:white">Wiwit AB</h1>
      <div class="container"> 
      <h2 style="color:white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </h2>
      </div>
      <a href="{{ route('about') }}" class="btn-about">See my profile</a>
    </div>
  </section><!-- End Hero -->

@endsection