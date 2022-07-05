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
</style>

<main id="main">

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2 style="color:white">Events</h2>
      <p style="color:white">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div>
  </div>
  <div class="container">
  <ul class="card-wrapper">
  @forelse($event as $e)
      <li class="card-event">
        <img src="/pictevent/{{ $e->photo }}" alt="film">
        <h3>{{ $e->title }}</h3>
        <p>{{ $e->content }}</p>
        <p><a href="https://{{ $e->link }}">{{ $e->link }}</a></p>
      </li>
  @empty
  @endforelse
  </ul>
  </div>
</section><!-- End Portfolio Section -->

</main><!-- End #main -->
@endsection