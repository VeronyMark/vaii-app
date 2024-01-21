<div class="container">

    <header class="blog-header py-5 position-sticky ">

        <div class="row">
            <!--        <div id="headerSubPages">   -->
            <div class="col-lg-4"></div>

            <div class="col-lg-4 text-center ">
                <img src="{{ asset('Images/logo/default-monochrome.svg') }}" alt="Logo" class="img-fluid">
            </div>


            <div class="col-lg-4 d-flex justify-content-center">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 z-10">
                        @auth

                            <span class=" fw-bold text-uppercase " style="color: #757575; ">Vitaj, {{auth()->user()->name}} !</span>
                            <button class=" btn btn-dark  mx-auto d-block "
                                    onclick="window.location.href='{{ route("home") }}'">HomePage
                            </button>
                            <div class="dropdown ">
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
                                            <button type="submit" class="btn btn-danger dropdown-item">Pridaj
                                                príspevok
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form method="POST" action="/logout" class="font-bold">
                                            @csrf
                                            <button type="submit" class="btn btn-danger dropdown-item">Odhlásenie
                                            </button>
                                        </form>
                                    </li>
                                </ul>


                            </div>

                        @else

                            <a href="{{ route('login') }}"
                               class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Prihlásenie</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrácia</a>
                            @endif

                            <button class=" btn btn-dark  mx-auto d-block  "
                                    onclick="window.location.href='{{ route("home") }}'">HomePage
                            </button>

                        @endauth
                    </div>
                @endif

            </div>
        </div>
    </header>
</div>
