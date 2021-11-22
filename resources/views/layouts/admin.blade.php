<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from flatable.phoenixcoded.net/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 11:25:26 GMT -->

<head>
  <title>Flat Able - Premium Admin Template by Phoenixcoded</title>

  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
  <meta name="description" content="Phoenixcoded" />
  <meta name="keywords"
    content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app" />
  <meta name="author" content="Phoenixcoded" />

  <link rel="icon" href="images/favicon.ico" type="image/x-icon" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.') }}css" />

  <link rel="stylesheet" type="text/css" href="{{ asset('icon/themify-icons/themify-icons.css') }}" />

  <link rel="stylesheet" type="text/css" href="{{ asset('icon/icofont/css/icofont.css') }}" />

  <link rel="stylesheet" type="text/css" href="{{ asset('pages/flag-icon/flag-icon.min.css') }}" />

  <link rel="stylesheet" type="text/css" href="{{ asset('pages/menu-search/css/component.css') }}" />

  @stack('styles')

  <link rel="stylesheet" type="text/css" href="{{ asset('pages/dashboard/horizontal-timeline/css/style.css') }}" />

  <link rel="stylesheet" type="text/css" href="{{ asset('pages/dashboard/amchart/css/amchart.css') }}" />

  <link rel="stylesheet" type="text/css" href="{{ asset('pages/flag-icon/flag-icon.min.css') }}" />

  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

  <link rel="stylesheet" type="text/css" href="{{ asset('css/color/color-1.css') }}" id="color" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/linearicons.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/simple-line-icons.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/ionicons.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.mCustomScrollbar.css') }}" />

</head>

<body>
  <div class="theme-loader">
    <div class="ball-scale">
      <div></div>
    </div>
  </div>

  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      {{-- Chat --}}
      @include('partials.navbar')
      {{-- End of Chat --}}

      {{-- Sidebar --}}
      @include('partials.chat')
      {{-- End of Sidebar --}}

      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
          {{-- Sidebar --}}
          @include('partials.sidebar')
          {{-- End of Sidebar --}}
          <div class="pcoded-content">
            <div class="pcoded-inner-content">
              <div class="main-body">
                <div class="page-wrapper">
                  @yield('content')
                </div>
                <div id="styleSelector"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--[if lt IE 9]>
      <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>
          You are using an outdated version of Internet Explorer, please upgrade
          <br />to any of the following web browsers to access this website.
        </p>
        <div class="iew-container">
          <ul class="iew-download">
            <li>
              <a href="http://www.google.com/chrome/">
                <img src="assets/images/browser/chrome.png" alt="Chrome" />
                <div>Chrome</div>
              </a>
            </li>
            <li>
              <a href="https://www.mozilla.org/en-US/firefox/new/">
                <img src="assets/images/browser/firefox.png" alt="Firefox" />
                <div>Firefox</div>
              </a>
            </li>
            <li>
              <a href="http://www.opera.com">
                <img src="assets/images/browser/opera.png" alt="Opera" />
                <div>Opera</div>
              </a>
            </li>
            <li>
              <a href="https://www.apple.com/safari/">
                <img src="assets/images/browser/safari.png" alt="Safari" />
                <div>Safari</div>
              </a>
            </li>
            <li>
              <a
                href="http://windows.microsoft.com/en-us/internet-explorer/download-ie"
              >
                <img src="assets/images/browser/ie.png" alt="" />
                <div>IE (9 & above)</div>
              </a>
            </li>
          </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
      </div>
    <![endif]-->

  <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('bower_components/tether/dist/js/tether.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

  <script type="text/javascript" src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.js') }}">
  </script>

  <script type="text/javascript" src="{{ asset('bower_components/modernizr/modernizr.js') }}"></script>
  <script type="text/javascript" src="{{ asset('bower_components/modernizr/feature-detects/css-scrollbars.js') }}">
  </script>

  <script type="text/javascript" src="{{ asset('bower_components/classie/classie.js') }}"></script>

  <script src="{{ asset('bower_components/d3/d3.js') }}"></script>
  <script src="{{ asset('bower_components/rickshaw/rickshaw.js') }}"></script>

  <script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
  <script src="{{ asset('bower_components/morris.js/morris.js') }}"></script>

  <script type="{{ asset('text/javascript" src="pages/dashboard/horizontal-timeline/js/main.js') }}"></script>

  <script type="text/javascript" src="{{ asset('pages/dashboard/amchart/js/amcharts.js') }}"></script>
  <script type="text/javascript" src="{{ asset('pages/dashboard/amchart/js/serial.js') }}"></script>
  <script type="text/javascript" src="{{ asset('pages/dashboard/amchart/js/light.js') }}"></script>
  <script type="text/javascript" src="{{ asset('pages/dashboard/amchart/js/custom-amchart.js') }}"></script>

  <script type="text/javascript" src="{{ asset('bower_components/i18next/i18next.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js') }}">
  </script>
  <script type="text/javascript"
    src="{{ asset('bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js') }}">
  </script>
  <script type="text/javascript" src="{{ asset('bower_components/jquery-i18next/jquery-i18next.min.js') }}"></script>

  <script type="text/javascript" src="{{ asset('pages/dashboard/custom-dashboard.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

  <script src="{{ asset('js/pcoded.min.js') }}"></script>
  <script src="{{ asset('js/demo-12.js') }}"></script>
  <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
  <script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
  @stack('scripts')
</body>

<!-- Mirrored from flatable.phoenixcoded.net/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 11:30:25 GMT -->

</html>