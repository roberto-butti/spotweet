<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Rbit/Spotweet</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="author" href="/humans.txt" />

  
  <link rel="stylesheet" href="/assets/zurb/css/foundation.css" />
  @section('custom_javascripts')
  <!-- NO CUSTOM JS -->
  @show

  <script src="/assets/zurb/js/vendor/custom.modernizr.js"></script>

</head>
<body>
  @include('block.menu')

  <div class="row">
    <div class="large-12 columns">
    @yield('content_charts')
    </div>
  </div>

  <div class="row">
    <div class="large-12 columns">
    @yield('content_map')
    </div>
  </div>


  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? '/zurb/js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="/assets/zurb/js/foundation.min.js"></script>
  <!--
  
  <script src="js/foundation/foundation.js"></script>
  
  <script src="js/foundation/foundation.alerts.js"></script>
  
  <script src="js/foundation/foundation.clearing.js"></script>
  
  <script src="js/foundation/foundation.cookie.js"></script>
  
  <script src="js/foundation/foundation.dropdown.js"></script>
  
  <script src="js/foundation/foundation.forms.js"></script>
  
  <script src="js/foundation/foundation.joyride.js"></script>
  
  <script src="js/foundation/foundation.magellan.js"></script>
  
  <script src="js/foundation/foundation.orbit.js"></script>
  
  <script src="js/foundation/foundation.placeholder.js"></script>
  
  <script src="js/foundation/foundation.reveal.js"></script>
  
  <script src="js/foundation/foundation.section.js"></script>
  
  <script src="js/foundation/foundation.tooltips.js"></script>
  
  <script src="js/foundation/foundation.topbar.js"></script>
  
  -->
  
  <script>
    $(document).foundation();
  </script>
</body>
</html>