<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('default/assets/css/bootstrap.min.css') }}">
    <!--front Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300&display=swap" rel="stylesheet">

    <!--Owl coursel-->
    <link rel="stylesheet" href="{{ asset('default/assets/plugins/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('default/assets/css/style.css') }}">


    @yield('page-title', '<title>Hello world</title>')

    @stack('css')

</head>
<body>
{{--header--}}
@yield('header')

<!--Body part-->
@yield('body')

<!--Footer Part Start-->
@yield('footer')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('default/assets/js/jquery-3.3.1.slim.min.js')  }}"></script>
<script src="{{ asset('default/assets/js/popper.min.js')  }}"></script>
<script src="{{ asset('default/assets/js/bootstrap.min.js')  }}"></script>

<script src="{{ asset('default/assets/plugins/OwlCarousel2-2.3.4/docs/assets/owlcarousel/owl.carousel.js')  }}"></script>

<script src="{{ asset('default/assets/js/script.js')  }}"></script>

@stack('js')

</body>
</html>