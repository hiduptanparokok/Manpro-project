@extends('layouts.app')

@section('content')

<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1 style="color:white">Wiwit AB</h1>
      
      <h2 style="color:white">Lecturer di Universitas Amikom Yogyakarta
      Daerah Istimewa Yogyakarta, Indonesia.</h2>
      
      <a href="{{ route('about') }}" class="btn-about">See my profile</a>
    </div>
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <img src="{{ asset('assets/user/img/1.jpg') }}" alt="1.jpg">
      </div>
  </section><!-- End Hero -->

@endsection