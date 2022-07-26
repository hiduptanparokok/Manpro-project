@extends('layouts.app')

@section('content')

<style>
  .card-event {
      background-color: #fff;
      border-radius: 0.5rem;
      box-shadow: 0.05rem 0.1rem 0.3rem -0.03rem rgba(0, 0, 0, 0.45);
      padding-bottom: 1rem;
    }
    
    .card-event > :last-child {
      margin-bottom: 0;
    }
    
    .card-event h3 {
      margin-top: 1rem;
      font-size: 1.25rem;
    }
    
    img {
      border-radius: 0.5rem 0.5rem 0 0;
      width: 100%;
      object-fit: cover;
      aspect-ratio: 4/3;
    }
    
    img ~ * {
      margin-left: 1rem;
      margin-right: 1rem;
    }

  .card-wrapper {
      list-style: none;
      padding: 0;
      padding-right: 80px;
      padding-left: 80px;
      margin: 0;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(30ch, 1fr));
      grid-gap: 1.5rem;
  }

  .ellipsis{
    overflow-x: hidden; 
    white-space: nowrap; 
    text-overflow: ellipsis; 
    display: ;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
  }

</style>

<main id="main">
  @csrf
 <!-- ======= Materi Perkuliahan Section ======= -->
 <section id="materi" class="materi">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2 style="color:white">Events</h2>
    </div>
  </div>
  <div class="container">
  <ul class="card-wrapper" >
  @forelse($materi as $m)
      <li class="card-event">
        <embed type="application/pdf" src="/filemateri/{{ $m->file }}" frameborder="0" alt="Card image cap"></embed>
        <h3 style="font-weight: bold">{{ $m->title }}</h3>
        <p class="ellipsis">{{ $m->desc }}</p>
        <button type="button" class="btn btn-success"> <a href="/filemateri/{{ $m->file }}" data-gallery="portfolioGallery" class="portfolio-lightbox text-white">Preview</a></button>
      </li>
  @empty
  @endforelse
  </ul>
  </div>
</section>





 {{-- <section id="materi" class="materi">
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
<br> --}}
@endsection