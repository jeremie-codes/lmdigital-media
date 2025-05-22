<?php $page='rubrique' ?>
@extends('app')

@section('content')

<section
  class="page-header page-header-modern page-header-background parallax overlay overlay-color-dark overlay-show overlay-op-5 m-0 py-0"
  data-plugin-parallax data-plugin-options="{'speed': 1.2}"
  data-image-src="img/demos/hotel/backgrounds/background-5.jpg">
  <div class="container py-4">
    <div class="row py-5">
      <div class="col-md-12 align-self-center p-static text-center">
        <h1 class="text-light mt-4 mb-0 pb-0 font-weight-bold text-8">Rubriques</h1>
        <div class="divider divider-primary divider-small my-3 text-center">
          <hr class="mt-2 mx-auto">
        </div>
      </div>
      <div class="col-md-12 align-self-center">
        <ul class="breadcrumb breadcrumb-light d-block mb-4 text-center">
          <li><a href="#">Accueil</a></li>
          <li class="active">Autres Rubriques</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="container py-5">

  <div class="row">

    <div class="col">

      <ul class="nav nav-pills nav-pills-center sort-source text-2 text-uppercase mb-4 mt-0" data-sort-id="portfolio"
        data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
        <li class="nav-item active" data-option-value="*"><a
            class="nav-link text-uppercase font-weight-bold text-3 active" href="#">Tout voir</a></li>
        <li class="nav-item" data-option-value=".Politique"><a class="nav-link text-uppercase font-weight-bold text-3"
            href="#">Politique</a></li>
        <li class="nav-item" data-option-value=".Sport"><a class="nav-link text-uppercase font-weight-bold text-3"
            href="#">Sport</a></li>
        <li class="nav-item" data-option-value=".Culture"><a class="nav-link text-uppercase font-weight-bold text-3"
            href="#">Culture</a></li>
        <li class="nav-item" data-option-value=".Santé&environement"><a
            class="nav-link text-uppercase font-weight-bold text-3" href="#">Santé et Environnement</a></li>
      </ul>

      <div class="sort-destination-loader sort-destination-loader-showing mb-0">
        <div class="row portfolio-list sort-destination" data-sort-id="portfolio">

          @foreach ($rubriques as $rubrique)
						<div class="col-md-6 col-lg-4 isotope-item {{ $rubrique->categorie }} mb-0 pb-0">
							@if ($rubrique->video == "")
								<img	src="{{ url('storage/' . $rubrique->image ) }}" class="img-fluid" alt="">
							@else
								<iframe src="{{ url('storage/' . $rubrique->video ) }}" frameborder="0"></iframe>
							@endif

								<h5 class="text-transform-none text-4 font-weight-bold mt-3 mb-0">{{ $rubrique->titre }}</h5>
								<div class="custom-room-suite-info mb-5 mb-lg-0">
									<ul>
										<li>
											<label>{{ $rubrique->sous_titre }}</label>	<span>{{ $rubrique->created_at }}</span>
											<a href="/detail" class="room-suite-info-book" title="">Lire</i></a>
										</li>
									</ul>
								</div>
							</div>		
						@endforeach
          
        </div>
      </div>

    </div>

  </div>

</div>

@endsection