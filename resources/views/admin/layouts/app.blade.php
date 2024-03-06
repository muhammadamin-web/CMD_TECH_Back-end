<!-- resources/views/layouts/app.blade.php -->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSS -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <title>{{ config('app.site_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('css/tour.css') }}"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/send_telegram.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


      <!-- Bootstrap CSS -->
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <style>
        .ck-content img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .drop-area img {
            margin: 5px;
        }

        .form-group textarea img {
            max-height: 200px;
            width: auto;
        }

        .ck-content img {
            max-height: 400px;
        }

        .image img {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            display: block;
            max-height: 300px;
            object-fit: cover;
            max-width: 100%;
        }

        @media only screen and (max-width: 768px) {
            .card-body {
                overflow-x: auto;
            }
        }

        .navbar-toggler {
            display: block;
            /* yoki shartga qarab, boshqa bir CSS qoida */
        }

        .card-body {
            display: block;
        }

        .ck-content img {
            max-height: 400px;
        }

        .card-body p img {
            text-align: center;
            max-width: 80%;
            max-height: 400px;
        }

        .drop-area {
            border: 2px dashed #ccc;
            padding: 100px;
            position: relative;
        }

        .drop-area.over {
            border: 2px dashed #666;
        }

        img {
            max-width: 100%;
        }

        #navbarSupportedContent.collapsing {
            -webkit-transition: max-height 0.5s ease;
            -o-transition: max-height 0.5s ease;
            transition: max-height 0.5s ease;
        }

        @media (max-width: 768px) {
            #navbarSupportedContent.collapse {
                max-height: 0;
                overflow: hidden;
            }

            #navbarSupportedContent.collapse.show {
                max-height: 500px;
                /* Menyuning maksimal balandligi, moslashtirish kerak */
            }
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.site_name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tours.index') }}">{{ __('Услуги') }}</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">{{ __('Статьи') }}</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route(config('app.crud_two_admin') . '.index') }}">{{ config('app.crud_two_name') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('leads.index') }}">{{ __('Лидов') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tags.index') }}">{{ __('Теги') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client_comments.index') }}">{{ __('Комментарий клиента') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route(config('app.crud_one_admin') . '.index') }}">{{ config('app.crud_one_name') }} </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Авторизоваться') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gamburger menu tugmasini topish
            var toggler = document.querySelector('.navbar-toggler');
            var collapse = document.getElementById('navbarSupportedContent');

            // Tugmani bosish voqeasini eshitish
            toggler.addEventListener('click', function(e) {
                // Agar menyu ochiq bo'lsa va tugma bosilgan bo'lsa, menyu yopiladi
                if (collapse.classList.contains('show')) {
                    e.preventDefault();
                    e.stopPropagation();
                    collapse.classList.remove('show');
                } else {
                    // Agar menyu yopiq bo'lsa, Bootstrap o'zi bajaradi
                    collapse.classList.add('show');
                }
            });
        });
    </script>

    <script>
        // PHP'dan JavaScript'ga tillar ro'yxatini o'tkazish
        var locales = @json(config('app.available_locales'));

        // Har bir til uchun CKEditor yaratish
        locales.forEach(function(locale) {
            ClassicEditor
                .create(document.querySelector('#description_' + locale), {
                    ckfinder: {
                        uploadUrl: '{{ route("ckeditor.upload") . ' ? _token = ' . csrf_token() }}'
                    },
                    on: {
                        instanceReady: function(event) {
                            this.dataProcessor.htmlFilter.addRules({
                                elements: {
                                    img: function(el) {
                                        el.attributes.style = 'max-height:400px; display: block; margin-left: auto; margin-right: auto;';
                                    }
                                }
                            });
                        }
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="ckeditor.js"></script>

    
</body>

</html>