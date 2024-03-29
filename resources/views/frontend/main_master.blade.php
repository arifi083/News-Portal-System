@php
 $seo = DB::table('seo')->first();
@endphp
<!DOCTYPE html>
<html lang="en">
    <head> <!-- {{ asset('frontend/') }} -->	
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="{{ $seo->meta_author }}">
        <meta name="keyword" content="{{ $seo->meta_keyword }}">
        <meta name="description" content="{{ $seo->meta_description }}">
        <meta name="google-verification" content="{{ $seo->google_verification  }}">
        <title>{{ $seo->meta_title}}</title>

        <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }} " rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/menu.css') }} " rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/font-awesome.min.css') }} " rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/font-awesome.css') }} " rel="stylesheet">
        <link href="{{ asset('frontend/ assets/css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/owl.carousel.min.css') }} " rel="stylesheet">
        <link href="{{ asset('frontend/style.css') }} " rel="stylesheet">
        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=61793ea56fc5810019e086c1&product=inline-share-buttons' async='async'></script>

    </head>
    <body>


     @include('frontend.body.header') 
	
	
     @yield('content')

     @include('frontend.body.footer') 
     

	
	
		<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
	</body>
</html> 