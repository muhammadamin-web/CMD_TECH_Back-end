
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

@include('layouts.meta')
@yield('meta')


<style>
                        .ck-content img {
    display: block;
    margin-left: auto;
    margin-right: auto;
}

          .form-group textarea img {
    max-height: 200px;
    width: auto;
}
.ck-content img {
    /* max-height: 400px; */
}
    .image img {
        text-align: center ;
        margin-left: auto;
margin-right: auto;
display: block;
        /* max-height: 400px; */
    }
.card-body{
    display: block;
}.ck-content img {
    /* max-height: 400px; */
}
.card-body p img{
    text-align: center;
    max-width: 80%;
    /* max-height: 400px; */
}
        </style>

</head>
<body>
@yield('navbar')
@include('layouts.navbar')

        @yield('content')
        @include('layouts.footer')
   
</body>
</html>
