<?php $page='index' ?>
@extends('app')

@section('content')

  <div
    class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover nav-inside nav-inside-plus nav-dark nav-md nav-font-size-md show-nav-hover mb-0"
    data-plugin-options="{'autoplayTimeout': 7000}" data-dynamic-height="['670px','670px','670px','550px','500px']"
    style="height: 670px;">
    <div class="owl-stage-outer">
      <div class="owl-stage">

        <!-- Carousel Slide 1 -->
        <div class="owl-item position-relative overlay overlay-show overlay-op-7 lazyload"
            data-bg-src="{{ url('images/ban.png') }}" style="background-size: cover; background-position: center;">
            <div class="container position-relative z-index-3 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column align-items-center">
                        <h2 class="text-warning font-weight-extra-bold text-12 mb-3 appear-animation text-center w-full" style="width: 100%; line-height: 54px;"
                            data-appear-animation="blurIn" data-appear-animation-delay="500"
                            data-plugin-options="{'minWindowWidth': 0}">Bienvenue sur Lumière Digitale Média, Votre Média par excéllence,</h2>
                        <h3
                            class="position-relative text-color-light text-5 line-height-5 font-weight-medium px-4 mb-2 appear-animation"
                            data-appear-animation="fadeInDownShorter" data-plugin-options="{'minWindowWidth': 0}">
                            </span>
                            Excellentia Semper Ubique.
                            <span class="position-absolute left-100pct top-50pct transform3dy-n50 opacity-3">
                            <img src="img/lazy.png" data-src="img/slides/slide-title-border.png"
                                class="w-auto appear-animation lazyload" data-appear-animation="fadeInRightShorter"
                                data-appear-animation-delay="250" data-plugin-options="{'imgFluid': false, 'minWindowWidth': 0}"
                                alt="" />
                            </span>
                        </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Slide 2 -->
        <div class="owl-item position-relative"
          style="background-color: #2E3136; background-size: cover; background-position: center;">
          <video src="{{ url('images/news.mp4') }}" autoplay muted loop playsinline class="w-100 cover bg-dark"></video>
        </div>

        <!-- Carousel Slide 3 -->
        <div class="owl-item position-relative overlay overlay-show overlay-op-7 lazyload"
          data-bg-src="{{ url('images/ban.png') }}" style="background-size: cover; background-position: center;">
          <div class="container position-relative z-index-3 h-100">
            <div class="row justify-content-center align-items-center h-100">
              <div class="col-lg-6">
                <div class="d-flex flex-column align-items-center">
                  <h2 class="text-warning font-weight-extra-bold text-12 mb-3 appear-animation text-center "
                    data-appear-animation="blurIn" data-appear-animation-delay="500" style="width: 100%; line-height: 54px;"
                    data-plugin-options="{'minWindowWidth': 0}">Vous informer est notre dévoir et votre droit,</h2>
                  <h3
                    class="position-relative text-color-light text-5 line-height-5 font-weight-medium px-4 mb-2 appear-animation"
                    data-appear-animation="fadeInDownShorter" data-plugin-options="{'minWindowWidth': 0}">
                    </span>
                    c'est notre devoir et votre droit.
                    <span class="position-absolute left-100pct top-50pct transform3dy-n50 opacity-3">
                      <img src="img/lazy.png" data-src="img/slides/slide-title-border.png"
                        class="w-auto appear-animation lazyload" data-appear-animation="fadeInRightShorter"
                        data-appear-animation-delay="250" data-plugin-options="{'imgFluid': false, 'minWindowWidth': 0}"
                        alt="" />
                    </span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="owl-nav">
      <button type="button" role="presentation" class="owl-prev" aria-label="Previous"></button>
      <button type="button" role="presentation" class="owl-next" aria-label="Next"></button>
    </div>
    <div class="owl-dots mb-5">
      <button role="button" class="owl-dot active"><span></span></button>
      <button role="button" class="owl-dot"><span></span></button>
      <button role="button" class="owl-dot"><span></span></button>
    </div>
  </div>

  <!-- SECTION RECENT -->
  <section class="m-0 section section-no-background section-no-border pt-0">
    <div class="container">

      <div class="row">
        <div class="col">
          <hr class="solid my-5">
          <h4>NOS VIDÉOS RÉCENTES</h4>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="carousel-half-full-width-wrapper carousel-half-full-width-left">
            <div
              class="owl-carousel owl-theme nav-bottom nav-bottom-align-right nav-style-1 nav-dark nav-font-size-lg mb-0"
              data-plugin-options="{'responsive': {'0': {'items': 1}, '768': {'items': 3}, '992': {'items': 4}, '1200': {'items': 4}}, 'rtl': true, 'loop': false, 'nav': true, 'dots': false, 'margin': 20}">

              {{-- @if( count($newsvideo) ) --}}
                <div>
                  <!--<span class="thumb-info-type">Aucun vidéo récente !</span>-->
                  <h3 class="pb-0 mb-0 text-primary" style="font-size: 12px;">Aucun vidéo récente !</h3>
                </div>
              {{-- @endif --}}

              @foreach( $newsvideo as $article )
                <div>
                  <a href="{{ url('article/news/' . $article->id) }}" aria-label="">
                    <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
                      <span class="thumb-info-wrapper">
                        <iframe src="{{ $article->video }}" frameborder="0"></iframe>
                        <span class="thumb-info-title">
                          <span class="thumb-info-inner">{{ $article->titre }}</span>
                          <span class="thumb-info-type">Régarder</span>
                        </span>
                        <span class="thumb-info-action">
                          <span class="thumb-info-action-icon"><i class="fas fa-plus"></i></span>
                        </span>
                      </span>
                    </span>
                  </a>
                </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- SECTION EN Annonce -->
  <section class="m-0 border-0 section section-parallax bg-tertiary" data-plugin-parallax
    data-plugin-options="{'speed': 1.1, 'parallaxHeight': '200%'}"
    data-image-src="img/demos/hotel/backgrounds/background-3.png">
    <div class="container">
      <div class="row">
        <div class="text-center col-lg-12">
          <h3 class="pb-0 mt-4 mb-0 text-warning">Annonce</h3>
          <div class="my-3 divider divider-light divider-small divider-small-center">
            <hr class="mt-2">
          </div>
        </div>
      </div>
      <div class="px-0 pt-0 row">
        <div class="px-0 pb-0 mb-2 col">

          <div class="py-0 owl-carousel carousel-center-active-item-2 nav-style-4 mb-0 pb-0"
            data-plugin-options="{'items': 1, 'loop': true, 'nav': true, 'dots': false}">
            @foreach( $annonces as $annonce )

            <div style="box-shadow: 0 0 15px #49504c;">
              <div class="d-flex flex-column flex-md-row justify-content-between mb-0">
                <div class="author">
                  <h4 class="text-5 mb-0">{{ $annonce->categorie }}</h4>
                  <span class="opacity-7">{{ $annonce->sous_titre }}</span>
                </div>
                <span class="star-rating">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-color-dark"></i>
                  <i class="fas fa-star text-color-dark"></i>
                </span>
              </div>
              <p class="mb-0  text-primary">"{{ $annonce->contenu }}"</p>
            </div>

            @endforeach
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- SECTION NEWS -->
  <section class="m-0 section section-no-background section-no-border">
    <div class="container">
      <div class="row">
        <div class="my-3 col">

          <div class="text-center">
            <h3 class="pb-0 mb-0 text-primary">ACTUALITÉS</h3>
            <div class="my-3 divider divider-small divider-small-center" style="border-color: #1279be">
              <hr class="mt-2">
            </div>
          </div>

        @if( count($newsimage) == 0)
            <div class="text-center">
                <h3 class="pb-0 mb-0 text-primary" style="font-size: 12px;">Aucun article publié !</h3>
            </div>
        @endif

        @if( count($newsimage) != 0)
              <div class="pt-2 pb-3 row">
                    @foreach( $newsimage as $article )
                        <div class="mb-4 col-lg-4 mb-lg-0">
                          <article class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                            <div class="border-0 card border-radius-0 box-shadow-1">
                              <div class="p-3 card-body z-index-1">
                                <a href="{{ url('article/news/' . $article->id) }}">
                                    <div class="overflow-y-hidden" style="height: 250px;">
                                        <img class="mb-2 card-img-top border-radius-0" src="{{ url('storage/' . $article->image ) }}" alt="Card Image">
                                    </div>
                                </a>
                                <div class="p-0 card-body" style="line-height: 1">
                                  <h4 class="pb-1 mt-3 card-title text-5 font-weight-bold">
                                    <a class="text-color-dark text-decoration-none" href="{{ url('article/news/' . $article->id) }}">{{ $article->titre }} : </a>
                                    <a class="text-primary" style="font-size: 18px;" href="{{ url('article/news/' . $article->id) }}">{{ $article->sous_titre }}</a>
                                  </h4>
                                  <div class="mb-2 card-text">{!! strlen($article->contenu) > 90 ? substr($article->contenu, 0, 90) . '...' : $article->contenu !!}</div>
                                  <a class="mt-2 mb-4 font-weight-bold text-uppercase text-2 text-decoration-none text-primary"
                                    href="{{ url('article/news/' . $article->id) }}">Lire l'article <i class="fas fa-angle-right p-relative top-1 ms-1"></i></a>
                                </div>
                              </div>
                            </div>
                          </article>
                        </div>
                    @endforeach
                  </div>

                  <div class="pt-2 text-center">
                    <a href="/actualites"
                      class="px-5 py-3 mt-2 mb-2 btn btn-warning font-weight-bold text-uppercase appear-animation"
                      data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="500">Voir Plus</a>
                  </div>
                </div>
            @endif

        </div>

      </div>
    </div>
  </section>

@endsection
