@extends('layouts.layout')

@section('title', 'Luzarre - Home')

@section('content')
<div class="container-fluid home-container-fluid">
  <!-- Baris pertama dengan 1 kolom -->
    <div class="row home-row">
        <div class="col-12 position-relative campaign-img-wrapper">
            <img src="{{ asset('img/campaign/' . $campaigns[0]->media_url) }}" class="img-fluid campaign-img img-darken" alt="{{ $campaigns[0]->name }}">
            <div class="overlay-content">
                <h3 class="image-title">{{ $campaigns[0]->name }}</h3>
                <a href="{{ route('collection', $campaigns[0]->slug) }}" class="btn custom-btn">See More</a>
            </div>
        </div>
    </div>

    <!-- Baris kedua dengan 2 kolom, kolom kiri lebih besar dari kolom kanan -->
    <div class="row">
        <div class="col-md-6 col-12 home-row mb-md-0 position-relative campaign-img-wrapper">
            <img src="{{ asset('img/campaign/' . $campaigns[1]->media_url) }}" class="img-fluid campaign-img img-darken" alt="{{ $campaigns[1]->name }}">
            <div class="overlay-content">
                <h3 class="image-title">{{ $campaigns[1]->name }}</h3>
                <a href="{{ route('collection', $campaigns[1]->slug) }}" class="btn custom-btn">See More</a>
            </div>
        </div>
        <div class="col-md-6 home-row col-12 position-relative campaign-img-wrapper">
            <img src="{{ asset('img/campaign/' . $campaigns[2]->media_url) }}" class="img-fluid campaign-img img-darken" alt="{{ $campaigns[2]->name }}">
            <div class="overlay-content">
                <h3 class="image-title">{{ $campaigns[2]->name }}</h3>
                <a href="{{ route('collection', $campaigns[2]->slug) }}" class="btn custom-btn">See More</a>
            </div>
        </div>
    </div>

    <!-- Baris ketiga dengan 1 kolom -->
    <div class="row">
        <div class="col-12 position-relative campaign-img-wrapper">
            @if(str_contains($campaigns[3]->media_url, '.mp4'))
                <video class="img-fluid campaign-img" autoplay muted loop>
                    <source src="{{ asset('img/campaign/' . $campaigns[3]->media_url) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                <img src="{{ asset('img/campaign/' . $campaigns[3]->media_url) }}" class="img-fluid campaign-img img-darken" alt="{{ $campaigns[3]->name }}">
            @endif
            <div class="overlay-content">
                <h3 class="image-title">{{ $campaigns[3]->name }}</h3>
                <a href="{{ route('collection', $campaigns[3]->slug) }}" class="btn custom-btn">See More</a>
            </div>
        </div>
    </div>


    <!-- Bagian Collection dengan 3 kolom gambar -->
    <div class="row text-center my-5">
        <div class="col-12">
            <h3 class="collection-title">Our Collection</h3>
        </div>
    </div>

    <div class="row home-row">
        @foreach($categories as $category)
            <div class="col-md-4 col-12 position-relative collection-img-wrapper">
                <a href="{{ route('collection', $category->slug) }}">
                    <img src="{{ asset('img/collections/' . $category->media_url) }}" class="img-fluid collection-img img-darken" alt="{{ $category->name }}">
                    <div class="overlay-content-collection">
                        <h4 class="collection-list">{{ $category->name }}</h4>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
</div>

@endsection
