<?php $page='about' ?>
@extends('app')

@section('content')

  <section class="page-header page-header-modern bg-primary m-0 py-0">
    <div class="container py-2">
      <div class="row py-3">
        <div class="col-md-12 align-self-center p-static text-center">
          <h1 class="text-light mt-4 mb-0 pb-0 font-weight-bold text-8">À Propos</h1>
          <div class="divider divider-light divider-small my-3 text-center">
            <hr class="mt-2 mx-auto">
          </div>
        </div>
        <div class="col-md-12 align-self-center">
          <ul class="breadcrumb breadcrumb-light d-block mb-4 text-center">
            <li><a href="#">Accueil</a></li>
            <li class="active">À Propos de nous</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="m-0 section section-no-background section-no-border">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">

          <h3 class="pb-0 mt-4 mb-0">Lumière Digitale Média</h3>
          <div class="my-3 divider divider-primary divider-small">
            <hr class="mt-2 me-auto">
          </div>

          <p class="lead text-info"><span
              class="px-0 highlight highlight-primary highlight-bg-opacity highlight-animated "
              data-appear-animation="highlight-animated-start" data-appear-animation-delay="200"
              data-plugin-options="{'flagClassOnly': true}">Nous sommes une entreprise</span> dynamique et innovante spécialisée dans le services médiatiques et de communication, 
              avec pour mission d'éclairer le monde grâce à des contenus de qualités et une créativité exceptionnelle.</p>
              
           <p class="lead font-weight-bold"><span
              class="px-0 highlight highlight-primary highlight-bg-opacity highlight-animated"
              data-appear-animation="highlight-animated-start" data-appear-animation-delay="200"
              data-plugin-options="{'flagClassOnly': true}">Nos domaines d'expertise</span> </p>

            <ul class="mt-4 text-info px-0" style="font-size: 16px;">
                <li><b>Rédaction & Publication</b> : Articles, Enquêtes, Analyses pour journaux, magazines et plateformes numériques.</li>
                <li><b>Production multimédia</b> : Céations des podcasts, Repportages vidéo, Documentaires et Interviews.</li>
                <li><b>Edition & Presse</b> : Conception et distribution des journaux, Magazines et Supports périodiques.</li>
            </ul>

        </div>
        <div class="col-lg-6">

          <div class="clearfix my-4 micro-map box-shadow-custom">
            <div class="micro-map-map">
              <div id="googleMapsMicro" class="m-0 google-map d-flex align-items-center justify-content-center" style="height: 260px;">
                <img src="{{ url('images/_logo.png') }}" alt="">
              </div>
            </div>
            <div class="micro-map-info">
              <div class="micro-map-info-detail">
                <label class="opacity-7 d-block text-2">ADDRESS</label>
                <p class="mb-4 text-dark text-3 font-weight-bold line-height-5">52 Avenue Makwala, Q/Binza Delvaux, C/Ngaliema, Kinsahsa / RDC </p>

                <label class="opacity-7 d-block text-2">TÉLÉPHONES</label>
                <p class="mb-1 text-dark text-4 font-weight-bold line-height-5">+(243) 826 613 951</p>
                <p class="mb-0 text-dark text-3 font-weight-bold line-height-5">+(243) 819 293 555</p>
                {{-- <p class="mb-0 text-dark text-3 font-weight-bold line-height-5">+(243) 836 613 951</p> --}}
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

@endsection