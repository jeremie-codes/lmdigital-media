<?php $page='services' ?>
@extends('app')

@section('content')

<section
  class="page-header page-header-modern page-header-background parallax overlay overlay-color-dark overlay-show overlay-op-5 m-0 py-0"
  data-plugin-parallax data-plugin-options="{'speed': 1.2}"
  data-image-src="img/demos/hotel/backgrounds/background-4.jpg">
  <div class="container py-4">
    <div class="row py-5">
      <div class="col-md-12 align-self-center p-static text-center">
        <h1 class="text-light mt-4 mb-0 pb-0 font-weight-bold text-8">Nos services </h1>
        <div class="divider divider-primary divider-small my-3 text-center">
          <hr class="mt-2 mx-auto">
        </div>
      </div>
      <div class="col-md-12 align-self-center">
        <ul class="breadcrumb breadcrumb-light d-block mb-4 text-center">
          <li><a href="#">Accueil</a></li>
          <li class="active">Services</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="container py-5">

  <div class="row">

    <div class="col">

      @foreach( $services as $service )
      
        <div class="row mb-4">
          <div class="col">
            <article class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
              <div class="card border-0 border-radius-0 box-shadow-1">
                <div class="card-body p-4 m-2 z-index-1">
                  <div class="row">
                    <div class="col-md-4 pb-4 pb-md-0">
                      <a href="/about">
                        <img class="card-img-top border-radius-0" src="{{ url('storage/' . $service->image ) }} alt="Card Image">
                      </a>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body p-0">
                        <h4 class="card-title text-5 font-weight-bold pb-1 mt-0 pt-0 mb-2">
                          <a class="text-color-dark text-decoration-none" href="/about">{{ $service->titre }}</a>
                        </h4>
                        <h6 class="card-title text-3 font-weight-bold pb-0 mt-0 pt-0 mb-0">
                          <a class="text-info text-decoration-none" href="/about">{{ $service->sous_titre }}</a>
                        </h6>
                        <p style="line-height: 1" class="card-text mb-2 text-info">{{ $service->description }}</p>
                        <a class="font-weight-bold text-dark text-uppercase text-2 text-decoration-none mt-2 mb-4"
                          href="/about">Nous contacter <i class="fas fa-angle-right p-relative top-1 ms-1"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>

      @endforeach

    </div>

  </div>

</div>

@endsection