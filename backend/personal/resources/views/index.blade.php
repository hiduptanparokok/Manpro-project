@extends('layouts.app')

@section('content')

<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1 style="color:white">Wiwit AB</h1>
      
      <h2 style="color:white">Dosen di Universitas Amikom Yogyakarta
      Daerah Istimewa Yogyakarta, Indonesia.</h2>
      
      <a href="{{ route('about') }}" class="btn-about">See my profile</a>
    </div>
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <img src="{{ asset('assets/user/img/Buwiwid.png') }}" alt="Buwiwid.png" style="aspect-ratio: 3/3; padding-right: 120px; width: 120%;">
      </div>
  </section><!-- End Hero -->


      <!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2 style="color:white">Portofolio</h2>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
        </ul>
      </div>
    </div>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
      @forelse($porto as $p)
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-wrap">
          <img src="/pictportos/{{ $p->photo }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4 style="color:white">{{ $p->title }}</h4>
            <p style="color:white">{{ $p->desc }}</p>
            <div class="portfolio-links">
              <a href="/pictportos/{{ $p->photo }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $p->title }}"><i class="bx bx-plus"></i></a>
              <a href="{{ route('portofolio') }}" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"></a>
            </div>
          </div>
        </div>
      </div>
      @empty
      @endforelse
    </div>
  </div>
</section><!-- End Portfolio Section -->

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

<!-- ======= Event Section ======= -->
<section id="event" class="event">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2 style="color:white">Events</h2>
    </div>
  </div>
  <div class="container">
  <ul class="card-wrapper" >
  @forelse($event as $e)
      <li class="card-event">
        <img src="/pictevent/{{ $e->photo }}" alt="film">
        <h3 style="font-weight: bold"> {{ $e->title }}</h3>
        <p class="ellipsis"> {{ $e->content }}</p>
        <p><a href="https://{{ $e->link }}">{{ Str::limit($e->link,10) }}</a></p>
      </li>
  @empty
  @endforelse
  </ul>
  </div>
</section><!-- End Event Section -->

<main id="main">
  @csrf
 <!-- ======= Materi Perkuliahan Section ======= -->
 <section id="materi" class="materi">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2 style="color:white">Materi Perkuliahan</h2>
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
</section><!-- End Materi Perkuliahan Section -->


@endsection