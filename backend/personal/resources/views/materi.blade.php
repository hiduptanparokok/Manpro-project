@extends('layouts.app')

@section('content')
<main id="main">
  @csrf
 <!-- ======= Materi Perkuliahan Section ======= -->
 <section id="materi" class="materi">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2 style="color:white">Materi Perkuliahan</h2>
        </div>
<section>
  
@forelse($materi as $m)
<div class="container d-flex justify-content-center">
<div class="card" style="width: 50rem;">
  <embed type="application/pdf" src="/filemateri/{{ $m->file }}" frameborder="0" alt="Card image cap"></embed>
  <div class="card bg-dark card text-white">
    <h5 class="card-title text-white">{{ $m->title }}</h5>
    <p class="card-text">{{ $m->desc }}</p>
    <button type="button" class="btn btn-success"> <a href="/filemateri/{{ $m->file }}" data-gallery="portfolioGallery" class="portfolio-lightbox text-white">Preview</a></button>
  </div>
</div>
</div>
<br>
@empty
@endforelse
@endsection