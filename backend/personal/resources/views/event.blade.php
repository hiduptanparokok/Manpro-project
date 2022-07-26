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
        <p><a href="https://{{ $e->link }}">{{ Str::limit($e->link,20) }}</a></p>
      </li>
  @empty
  @endforelse
  </ul>
  </div>
</section><!-- End Event Section -->

</main><!-- End #main -->
@endsection