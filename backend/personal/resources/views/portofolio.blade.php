@extends('layouts.app')

@section('content')
<main id="main">

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2 style="color:white">Portfolio</h2>
      <p style="color:white">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
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
              <a href="/pictportos/{{ $p->photo }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="{{ route('portofolio') }}" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div>
      @empty
      @endforelse
    </div>
  </div>
</section><!-- End Portfolio Section -->
</main><!-- End #main -->
@endsection