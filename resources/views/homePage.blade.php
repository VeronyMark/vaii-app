<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TRM</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('Images/modrotlac.jpg') }}" type="image/jpeg">

</head>


<body>

<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen  bg-center   ">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 z-10 text-center">
            @auth

                <span class=" fw-bold text-uppercase  "
                      style="color: #757575; ">Vitaj, {{auth()->user()->name}} !</span>

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

                <a href="{{ route('login') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm  ">Prihlásenie</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm ">Registrácia</a>
                @endif

            @endauth
            <button class="btn btn-dark  mx-auto d-block  "
                    onclick="window.location.href='{{ route("welcome") }}'">ZOBRAZ VŠETKY BLOGY
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-6">
            <div style="height: 100vh">

                <img src="{{ asset('Images/modrotlac.jpg') }}" style="object-fit: cover; width: 100%; height: 100%"
                     class="  img-fluid" alt="Uvodná strana">

            </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="text-center">
                <h2>tradičné</h2>
                <h2 class="mt-4">REMESLÁ</h2>
                <h2 class="mt-4">moderne</h2>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8 mt-5 mx-auto">
            <p class="lead mb-4">
                Vitajte v svete tradičných ľudových remesiel na Slovensku!
                Naša krajina, s bohatou históriou a rozmanitým kultúrnym dedičstvom, nesie v sebe poklady, ktoré sa
                prenášajú z generácie na generáciu prostredníctvom tradičných remesiel.
                Tento blog sa zameriava na oživenie a zachovanie krásy a jedinečnosti ľudových remesiel, ktoré sú
                zároveň srdcom našej kultúry.
                Budeme venovať rôznym oblastiam tradičných remesiel, od kováčstva cez vyšívanie až po výrobu
                tradičných ľudových hračiek.
                Stretávame sa s remeselníkmi, ktorí svojimi zručnosťami a vášňou prenášajú odkaz minulosti do
                súčasnosti.
                Bude to cesta časom, pri ktorej spolu objavíme krásu tradícií a ich význam v dnešnom rýchlo meniacom
                sa svete.
                Vítajte medzi nami na tejto ceste objavovania tradičných ľudových remesiel na Slovensku!
            </p>
        </div>
    </div>
</div>


<div class=" d-flex justify-content-center align-items-center mt-16 mb-4" style="min-height: 100vh;">
    <div id="carouselTrhy" class="col-md-4">
        <div id="carroucel_index" class="carousel slide" style="width: 100%;">
            <div class="carousel-indicators ">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
            </div>


            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="{{ asset('Images/blogPromo.jpg') }}" class="d-block w-100"
                         style="filter: blur(4px) brightness(70%)" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="color: whitesmoke">PRIDAJ SA K NÁM A ZAČNI PÍSAŤ!</h5>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('Images/handmadesoap.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block ">
                        <h5 style="color: #333333">PODEĽ SA O SVOJE TYPY </h5>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('Images/trh01.jpg') }}" class="d-block w-100"
                         style="filter: blur(4px) brightness(70%)" alt="...">
                    <div class="carousel-caption  d-none d-md-block">
                        <h5>ZISTI VIAC O TRADÍCIACH</h5>
                    </div>
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carroucel_index"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carroucel_index"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>


        </div>
    </div>
</div>


<div class="container-fluid mt-16">
    <div class="row">

        <div class="col-lg-6 d-flex  align-items-center justify-content-center">
            <div class="text-center">
                <h3>Chceme počuť aj tvoj príbeh!</h3>
                <h3 class="h-s"><strong>PRIHLÁSTE </strong><em><strong>alebo</strong></em>
                    <strong>REGISTRUJE SA <br> pre pridanie príspevkov!</strong></h3>

                <p>Pridajte sa k nám a začnite písať svoje vlastné texty a blogy! 📝
                    Vytvorme spolu miesto, kde sa zdieľa láska k slovu a myšlienkam. Čakáme na
                    vaše príspevky s nádejou a
                    očakávaním! 🛠️💬</p>
                <p> Zaregistrujte sa ešte dnes a pridajte svoj jedinečný príbeh do našej
                    zbierky! 🌿🌟</p>

                <p>Ak máš nejaké zážitky, príbehy, alebo inšpirácie, ktoré by si chcel(a) zdieľať s komunitou, neváhaj!
                    Staň sa súčasťou našej stránky a pridaj svoj blogový príspevok.</p>
            </div>
        </div>


        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="content-group switch-side">
                <div class="group">
                    <figure>
                        <div class="visual-global relative">
                            <img src="{{asset('Images/Pottery.jpg')}}" alt="Obrazok znazornuje hrnciarstvo">
                        </div>

                        <figcaption class="p-m text-center ">
                            <p>Veríme, že každý má svoj jedinečný príbeh na rozprávanie. Preto ťa <br> srdečne vítame
                                medzi nás a dávame ti príležitosť zdielať svoje<br>skúsenosti s celým svetom.</p>

                        </figcaption>
                    </figure>

                    <figure>
                        <div class="visual-global relative mt-16">
                            <img src="{{asset('Images/Pottery_salky.jpg')}}" alt="Obrazok znazornujuci salky">
                        </div>
                        <figcaption class="p-m text-center  ">


                            <p>Zdieľajte svoje výrobky</p>


                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="mt-16">
    <img src="{{asset('Images/trh03.jpg')}}" alt="Obrazok znazornuje hrnciarstvo"
         sizes="(max-width: 1440px) 100vw, 1440px" style="object-position: 50% 50%"
         width="2000" height="1282">
</div>


<div class="container mt-16 ">
    @if ($posts->count())
        <div class="col-lg-12">
            <h3 class="pb-4 mb-4 border-bottom mt-16">Nenechaj si újsť náš najnovší blog </h3>
            <x-blog-ukazka :post="$posts[0]"/>
        </div>

        <button class="btn btn-dark btn-lg mx-auto d-block mt-16 mb-5"
                onclick="window.location.href='{{ route("welcome") }}'">ZOBRAZ VŠETKY BLOGY
        </button>
    @endif

</div>


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

</body>

</html>
