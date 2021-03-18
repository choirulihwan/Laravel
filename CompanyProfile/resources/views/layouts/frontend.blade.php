<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>Laravel - Smash (Bootstrap Business Template)</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }} " type="image/png">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.css') }}">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
</head>
<body>
    <!--====== PRELOADER PART START ======-->
    @include('includes.preloader')
    <!--====== PRELOADER PART ENDS ======-->

    <!--====== NAVBAR TWO PART START ======-->    
    @include('includes.navbar')   
    <!--====== NAVBAR TWO PART ENDS ======-->

    <!--====== SLIDER PART START ======-->
    @include('includes.slider')  
    <!--====== SLIDER PART ENDS ======-->

    <!--====== FEATRES TWO PART START ======--> 
    @include('includes.feature2')
    <!--====== FEATRES TWO PART ENDS ======-->

    <!--====== PORTFOLIO PART START ======-->
    @include('includes.portofolio')
    <!--====== PORTFOLIO PART ENDS ======-->

    <!--====== PRINICNG START ======-->
    @include('includes.pricing')
    <!--====== PRINICNG ENDS ======-->

    <!--====== ABOUT PART START ======-->
    @include('includes.about')
    <!--====== ABOUT PART ENDS ======-->

    <!--====== TEAM START ======-->
    @include('includes.team')
    <!--====== TEAM  ENDS ======-->

    <!--====== CONTACT PART START ======-->
    @include('includes.contact')
    <!--====== CONTACT PART ENDS ======-->

    <!--====== TESTIMONIAL PART START ======-->
    @include('includes.testimonial')
    <!--====== TESTIMONIAL PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    @include('includes.footer')
    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->    


    <!--====== Jquery js ======-->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    
    <!--====== Slick js ======-->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="{{ asset('assets/js/ajax-contact.js') }}"></script>
    
    <!--====== Isotope js ======-->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    
    <!--====== Scrolling Nav js ======-->
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrolling-nav.js') }}"></script>
    
    <!--====== Main js ======-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>