<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- textarea editor  --}}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    {{-- jQuery cdn added for modal use and effects.. --}}
    <script
			  src="https://code.jquery.com/jquery-3.2.1.js"
			  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			  crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet">

    {{-- advertisment index animation on hover --}}
    <style media="screen">
      .grow:hover
      {
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);

      }
      .shrink:hover
      {
            -webkit-transform: scale(0.9);
            -ms-transform: scale(0.9);
            transform: scale(0.9);

      }
      .well
      {
        transition:all 0.3s ease;

      }
      .shadow{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }
    </style>

      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RealEstApp') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style media="screen">
      html {
        height: 100%;
        box-sizing: border-box;
      }

      *,
      *:before,
      *:after {
        box-sizing: inherit;
      }

      body {
        position: relative;
        margin: 0;
        padding-bottom: 6rem;
        min-height: 100%;
        font-family: "Helvetica Neue", Arial, sans-serif;
      }
      img{
        max-width: 100%;
        height: auto;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }
      a,a:hover{
        color: black;
      }
    </style>
</head>
<body>
    <div id="app">
        @include('inc.navbar')
        @include('inc.messages')
        <div class="container shadow" style="border-radius: 25px;">
            @yield('content')
        </div>
    </div>

    <div class="footer" style="position: absolute;
                              right: 0;
                              bottom: 0;
                              left: 0;
                              padding: 1rem;
                              background-color: #efefef;
                              text-align: center;">
      <strong>&copy; Copyright <?php echo (int)date('Y'); ?> P.k</strong>
    </div>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{--image Modal pop script  --}}
    <script>
    $(function() {
      $('.pop').on('click', function() {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#imagemodal').modal('show');
      });
    });
    </script>
    {{-- Text editor for advertisement posts --}}
    <script>
    tinymce.init({ selector:'textarea',branding: false,height : 180,max_height: 200,browser_spellcheck: true });
    </script>
    {{-- Just a Go back button script --}}
    <script>
      function goBack() {
          window.history.back();
      }
    </script>

</body>
</html>
