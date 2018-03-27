<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('template.head_fragment')
    <script type="text/javascript" src="{{ asset('js/navbar.js') }}"></script>
    <style>body {
            background-image: url("/../img/seamless_paper_texture.png");
        }</style>
</head>
<body>
<header>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">
                @yield('titre')
            </h1>
        </div>
    </div>
</header>
@include('template.navbar')

<section class="back_section mb-5 mt-5 content container">
        @yield('content')
</section>

<footer class="bg-dark">
    <div class="container">
        <em>Machine à café laravel ilot 5</em>
    </div>
</footer>

</body>
</html>