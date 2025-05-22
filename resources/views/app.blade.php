<!DOCTYPE php>
<php lang="en" class="sticky-header-reveal">

  <head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Lumière Digital Média')</title>

    <meta name="keywords" content="WebSite Template" />
    <meta name="description" content="Porto - Multipurpose Website Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link id="googleFonts"
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap"
      rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ url('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ url('vendor/animate/animate.compat.css')}}">
    <link rel="stylesheet" href="{{ url('vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="{{ url('vendor/owl.carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ url('vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ url('vendor/magnific-popup/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{ url('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ url('css/theme.css') }}">
    <link rel="stylesheet" href="{{ url('css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ url('css/theme-blog.css') }}">
    <link rel="stylesheet" href="{{ url('css/theme-shop.css') }}">

    <!-- Revolution Slider CSS -->
    <link rel="stylesheet" href="{{ url('vendor/rs-plugin/css/settings.css')}} ">
    <link rel="stylesheet" href="{{ url('vendor/rs-plugin/css/layers.css')}} ">
    <link rel="stylesheet" href="{{ url('vendor/rs-plugin/css/navigation.css')}} ">

    <!-- Demo CSS -->
    <link rel="stylesheet" href="{{ url('css/demos/demo-hotel.css') }}">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="{{ url('css/skins/skin-hotels.css') }}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ url('css/custom.css') }}">

  </head>

  <style>
    .text-primary {
      color: #1279be !important;
    }
    .bg-primary {
      background: #1279be !important;
    }
    p {
        font-family: candara;
        font-size: 14px;

    }
    * {
        line-height: 1.2;
    }

    .nav-link{
        /* font-family: candara; */
        /* font-size: 14px; */
        color: #fff !important;
    }

    #mainNav li a:hover, #mainNav li a.active {
        background-color: #dfb601 !important;
        color: #fff !important;
    }

  </style>

  <body>

    <div class="body">

      <header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 45, 'stickySetTop': '-45px', 'stickyChangeLogo': true}">
        <div class="header-body border-top-0  bg-primary">
          <div class="header-container container bg-primary">
            <div class="header-row">
              <div class="header-column">
                <div class="header-row">
                  <div class="header-logo">
                    <a href="index.php">
                      <img alt="Porto" data-sticky-width="70" data-sticky-height="70" data-sticky-top="25" width="80"
                        height="80" src="{{ url('images/_logo.png') }}">
                    </a>
                  </div>
                </div>
              </div>
              <div class="header-column justify-content-end">
                <div class="header-row pt-3">

                  <nav class="header-nav-top">
                    <ul class="nav nav-pills">
                      <li class="nav-item nav-item-anim-icon d-none d-md-block">
                        <a class="nav-link ps-0" href="/about"><i class="fas fa-angle-right"></i> A Propos</a>
                      </li>
                      <li
                        class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-md-show">
                        <span class="ws-nowrap text-light"><i class="fas fa-phone"></i>+(243) 836 613 951</span>
                      </li>
                    </ul>
                  </nav>

                  {{-- <div class="header-nav-features">
                    <div class="header-nav-feature header-nav-features-search d-inline-flex">
                      <a href="#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch"
                        aria-label="Search">Fr</a>
                      <div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
                        <a class="dropdown-item" href="#FR">Français</a>
                        <a class="dropdown-item" href="#EN">Anglais</a>
                      </div>
                    </div>
                  </div> --}}

                </div>

                <div class="header-row">
                  <div class="header-nav pt-1">
                    <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
                      <nav class="collapse">
                        <ul class="nav nav-pills" id="mainNav">
                          <li class="">
                            <a class="text-white <?= $page=='index' ? 'active': '' ?>" href="/">
                              Accueil
                            </a>
                          </li>
                          <li class="">
                            <a class="text-white <?= $page=='actualites' ? 'active': '' ?>" href="/actualites">
                              Actualités
                            </a>
                          </li>
                          <li class="">
                            <a class="text-white <?= $page=='rubrique' ? 'active': '' ?> " href="/rubriques">
                              Rubriques
                            </a>
                          </li>
                          <li class="">
                            <a class="text-white <?= $page=='services' ? 'active': '' ?> " href="/services">
                              Service
                            </a>
                          </li>
                          <li class="">
                            <a class="text-white <?= $page=='opignons' ? 'active': '' ?> " href="/opinions-decouverte">
                              Opinion & Découverte
                            </a>
                          </li>
                        </ul>
                      </nav>
                    </div>
                    <ul class="header-social-icons social-icons d-none d-sm-block">
                      <li class="social-icons-facebook">
                        <a class="d-flex align-items-center justify-content-center" href="http://www.facebook.com/" target="_blank"
                          title="Facebook"><i class="fab  fa-facebook-f"></i></a>
                      </li>
                      <li class="social-icons-twitter">
                        <a class="d-flex align-items-center justify-content-center" href="http://www.twitter.com/" target="_blank"
                          title="Twitter"><i class="fab  fa-twitter"></i></a>
                      </li>
                      <li class="social-icons-linkedin">
                        <a class="d-flex align-items-center justify-content-center" href="http://www.linkedin.com/" target="_blank"
                          title="Linkedin"><i class="fab  fa-linkedin-in"></i></a>
                      </li>
                    </ul>
                    <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse"
                      data-bs-target=".header-nav-main nav">
                      <i class="fas fa-bars"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

      <div role="main" class="main">

        @yield('content') <!-- Chaque page peut insérer son contenu ici -->

        <section class="section section-tertiary section-no-border m-0">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3 mt-1 pt-2">

                <p class="lead p-0 m-0 text-3 opacity-7 text-uppercase">Inscrivez-vous maintenant dans </p>
                <h4 class="mb-1 mt-0 text-light font-weight-bold text-5-5 p-relative bottom-4">Notre NewsLetter:</h4>

              </div>
              <div class="col-lg-9">

                <div class="alert alert-success d-none" id="newsletterSuccess">
                  <strong>Success!</strong> You've been added to our email list.
                </div>

                <div class="alert alert-danger d-none" id="newsletterError"></div>

                <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
                  <div class="row">
                    <div class="form-group col-md-5">
                      <div class="form-control-custom">
                        <input type="text" class="form-control form-control-lg py-3 text-2 mt-2" id="newsletterName" placeholder="Nom complèt *" required>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="form-control-custom">
                        <input type="email" class="form-control form-control-lg py-3 text-2 mt-2" id="newsletterEmail" placeholder="Adresse Email *"
                        required>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <button type="submit" class="btn btn-warning font-weight-bold text-uppercase py-3 w-100 mt-2">S'inscrire</button>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </section>

        <footer id="footer" class="color bg-primary mt-0 py-5">
          <div class="container">
            <div class="row align-items-center my-3">
              <div class="col-md-4 text-center">
                <a href="demo-hotel.">
                  <img alt="Porto" class="img-fluid logo" style="max-width: 100px;" src="{{ url('images/_logo.png') }}">
                </a>
                <p class="text-warning text-medium" style="font-size: 14px;">
                    <b>LUMIÈRE DIGITALE MEDIA SARL </b> - Société à Responsabilitée Eclairons le monde à travers l'information et la créativité !
                </p>
              </div>
              <div class="col-md-4 text-center">

                  <h3>Nos coordonnées</h3>

                <div class="">

                  <div class="my-4 my-lg-0 feature-box feature-box-style-5">
                    <div class="feature-box-icon p-0 m-0">
                      <i class="icon-phone icons text-color-light text-5"></i>
                    </div>
                    <div class="feature-box-info p-0 ms-2">
                      <label class="text-light opacity-7 d-block line-height-5">CONTACTEZ-NOUS</label>
                      <strong class="text-uppercase text-4"><a href="tel:8001234567" class="text-light ws-nowrap">+(243) 826 613 951 / 819 293 555</a></strong>
                    </div>
                  </div>

                  <div class="my-4 my-lg-0 feature-box feature-box-style-5">
                    <div class="feature-box-icon p-0 m-0">
                      <i class="icon-location-pin icons text-color-light text-5"></i>
                    </div>
                    <div class="feature-box-info p-0 ms-2">
                      <label class="text-light opacity-7 d-block line-height-5">E-MAIL</label>
                          <strong class="text- text-4"><a href="tel:8001234567" class="text-light ws-nowrap">digitalelumiere14@gmail.com</a></strong>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-md-4 text-center text-lg-start">
                <div class="my-4 my-lg-0 feature-box feature-box-style-5 ms-lg-4">
                    <div class="feature-box-icon p-0 m-0">
                      <i class="icon-envelope icons text-color-light text-5"></i>
                    </div>
                    <div class="feature-box-info p-0 ms-2">
                      <label class="text-light opacity-7 d-block line-height-5">ADDRESSE</label>
                      <strong class="text-light text-4 line-height-5">KINSHASA, Commune de NGALIEMA, Quartier MBINZA DELVEAUX, Avenue MUKWALA N°52<a class="d-block font-weight-bold text-color-light text-uppercase text-1" href="#"><u>Get Directions</u></a></strong>
                    </div>

                  </div>
            </div>
          </div>
        </footer>

      </div>

    </div>

    <div class="pt-3 pb-5 footer-copyright bg-tertiary">
      <div class="container">
        <div class="row">
          <div class="pt-4 pb-3 col-lg-6 py-lg-0">
            <ul class="nav justify-content-center justify-content-lg-start">
              <li class="nav-item pe-4">
                <a class="p-0 nav-link text-2 text-uppercase font-weight-bold text-light" href="/">Accueil</a>
              </li>
              <li class="nav-item pe-4">
                <a class="p-0 nav-link text-2 text-uppercase font-weight-bold text-light" href="/actualites">Actualités</a>
              </li>
              <li class="nav-item pe-4">
                <a class="p-0 nav-link text-2 text-uppercase font-weight-bold text-light" href="/actualites">Contact</a>
              </li>
            </ul>
          </div>
          <div class="text-center col-lg-6 text-lg-end">
          </div>
        </div>
      </div>
    </div>

    <!-- Vendor -->
    <script src="{{ url('vendor/plugins/js/plugins.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ url('js/theme.js') }}"></script>

    <!-- Revolution Slider Scripts -->
    <script src="{{ url('vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ url('vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- Current Page Vendor and Views -->
    <script src="{{ url('js/views/view.contact.js') }}"></script>

    <!-- Demo -->
    <script src="{{ url('js/demos/demo-hotel.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ url('js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ url('js/theme.init.js') }}"></script>

  </body>
</html>
