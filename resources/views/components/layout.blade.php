<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <title>TRM-blog </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-min.js" defer></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



</head>

<body>


<div>
    <header class="blog-header py-5 position-sticky ">
        <div id="headerSubPages">
            <div class="col-4 "></div>

            <div class="col-4 text-center ">
                <img src="{{ asset('Images/logo/default-monochrome.svg') }}" alt="Logo" class="img-fluid">
            </div>


            <div class="col-4 d-flex justify-content-center  ">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 z-10">
                        @auth

                            <span class=" fw-bold text-uppercase " style="color: #757575; ">Vitaj, {{auth()->user()->name}} !</span>

                            <div class="dropup ">
                                <!-- IKONA-->
                                <a class="nav-link  dropdown-toggle text-black text-center" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-label">
                                    <i class="bi bi-person-circle"></i>
                                </a>
                                <!-- ELEMENTY-->
                                <ul class="dropdown-menu " aria-labelledby="dropdown-label">
                                    <li>
                                        <form method="get" action="/create" class="font-bold">
                                            @csrf
                                            <button type="submit" class="btn btn-danger dropdown-item">Pridaj príspevok</button>
                                        </form>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Informácie o profile</a></li>

                                    <li>
                                        <form method="POST" action="/logout" class="font-bold">
                                            @csrf
                                            <button type="submit" class="btn btn-danger dropdown-item">Odhlásenie</button>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        @else

                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Prihlásenie</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrácia</a>
                            @endif

                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </header>
</div>


{{$slot}}



</body>

<!-- Bootstrap JavaScript Bundle with Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-min.js" defer></script>

<!-- jQuery (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>

</html>
