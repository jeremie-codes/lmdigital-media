<?php $page='actualites' ?>
@extends('app')

@section('content')

	<section class="page-header page-header-modern page-header-background parallax overlay overlay-color-dark overlay-show overlay-op-5 m-0 py-0" data-plugin-parallax data-plugin-options="{'speed': 1.2}" data-image-src="img/demos/hotel/backgrounds/background-5.jpg">
		<div class="container py-4">
			<div class="row py-5">
				<div class="col-md-12 align-self-center p-static text-center">
					<h1 class="text-light mt-4 mb-0 pb-0 font-weight-bold text-8">Actualités</h1>
					<div class="divider divider-primary divider-small my-3 text-center">
						<hr class="mt-2 mx-auto">
					</div>
				</div>
				<div class="col-md-12 align-self-center">
					<ul class="breadcrumb breadcrumb-light d-block mb-4 text-center">
						<li><a href="#">Accueil</a></li>
						<li class="active">Actualités</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<div class="container py-5">

		<div class="row">

			<div class="col">

				<ul class="nav nav-pills nav-pills-center sort-source text-2 text-uppercase mb-4 mt-0" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
					<li class="nav-item active" data-option-value="*"><a class="nav-link text-uppercase font-weight-bold text-3 active" href="#">Tout voir</a></li>
					<li class="nav-item" data-option-value=".Afrique"><a class="nav-link text-uppercase font-weight-bold text-3" href="#">Afrique</a></li>
					<li class="nav-item" data-option-value=".Monde"><a class="nav-link text-uppercase font-weight-bold text-3" href="#">Monde</a></li>
					<li class="nav-item" data-option-value=".Nationale"><a class="nav-link text-uppercase font-weight-bold text-3" href="#">Nationale</a></li>
				</ul>

				<div class="sort-destination-loader sort-destination-loader-showing mb-0">
					<div class="row portfolio-list sort-destination" data-sort-id="portfolio">
						
						@foreach ($actualites as $actualite)
						<div class="col-md-6 col-lg-4 isotope-item {{ $actualite->region }} mb-0 pb-0">
							@if ($actualite->video == "")
								<img	src="{{ url('storage/' . $actualite->image ) }}" class="img-fluid" alt="">
							@else
								<iframe src="{{ url('storage/' . $actualite->video ) }}" frameborder="0"></iframe>
							@endif

								<h5 class="text-transform-none text-4 font-weight-bold mt-3 mb-0">{{ $actualite->titre }}</h5>
								<div class="custom-room-suite-info mb-5 mb-lg-0">
									<ul>
										<li>
											<label>{{ $actualite->sous_titre }}</label>	<span>{{ $actualite->created_at }}</span>
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