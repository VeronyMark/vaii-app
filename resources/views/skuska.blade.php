<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TRM | blog</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>


<body>

<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen  bg-center  selection:bg-blue selection:text-white">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <!--  PRIHLASENY
                <a href="{ url('/dashboard') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                <--to do over -->
                <span class=" text-center fw-bold text-uppercase ms-3 me-2" style="color: #757575;">Vitaj, {{auth()->user()->name}} !</span>

            @else

                <a href="{{ route('login') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>


                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif

            @endauth
        </div>
    @endif

    <!--NOVE -->
    <div class="row">
        <div class="col-lg-6">
            <div  style="height: 100vh">
                <!--    <div class="visual-container svelte-1c4i6cb has-animation" style="height: 100vh; overflow: hidden;"> -->
                <img style="object-fit: cover; width: 100%; height: 100%;"
                     src="{{asset('Images/modrotlac.jpg')}}"
                     alt="Uvodná strana"
                     loading="eager"
                />
            </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="text-center">
                <h1>tradičné</h1>
                <h1 class="mt-4">REMESLÁ</h1>
                <h1 class="mt-4">moderne</h1>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
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



<div class="container-fluid mt-16">
    <div class="row">
        <!-- Text Column -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="text-center">
                <h3 class="h-s"><strong>PRIHLÁSTE </strong><em><strong>alebo</strong></em>
                    <strong>REGISTRUJE SA pre pridanie príspevkov!</strong></h3>
                <p>Pridajte sa k nám a začnite písať svoje vlastné texty a blogy! 📝
                    Vytvorme spolu miesto, kde sa zdieľa láska k slovu a myšlienkam. Čakáme na
                    vaše príspevky s nádejou a
                    očakávaním! 🛠️💬</p>
                <p> Zaregistrujte sa ešte dnes a pridajte svoj jedinečný príbeh do našej
                    zbierky! 🌿🌟</p>

                <p>Ak máš nejaké zážitky, príbehy, alebo inšpirácie, ktoré by si chcel(a) zdieľať s komunitou, neváhaj! Staň sa súčasťou našej stránky a pridaj svoj blogový príspevok.</p>

                <h3 class="h-s"><strong> AKO NA TO ? </strong></h3>

                <ol >
                    <li>PRIHLÁS SA ALEBO REGISTRUJ SA</li>
                    <li>Vyber si tému, ktorá ťa inšpiruje.</li>
                    <li>Napíš svoj príspevok s láskou a autentičnosťou.</li>
                    <li>Pridaj obrázky, aby si vizuálne obohatil(a) svoj príbeh.</li>
                </ol>

                <p>Naša komunita je otvorená všetkým, ktorí majú vášeň pre tradičné remeslá a chcú zdieľať svoje jedinečné pohľady. Tešíme sa na tvoje príspevky!</p>

            </div>
        </div>

        <!-- Image Column -->
        <div class="col-lg-6">
            <div class="content-group switch-side">
                <div class="group">
                    <!-- Image 1 -->
                    <figure>
                        <div class="visual-global relative">


                            <img  src="{{asset('Images/Pottery.jpg')}}"
                                 alt="A small bedroom with a dressed bed in front of slightly parted curtains covering a wardrobe system."
                                 >
                        </div>
                        <figcaption class="p-m mt-6 ">
                            <div class="richtext-container align-items-left">
                                <div class="richtext inherit-font">
                                    <h3>Chceme počuť aj tvoj príbeh!</h3>

                                    <p>Veríme, že každý má svoj jedinečný príbeh na rozprávanie.</p>
                                    <p>Preto ťa srdečne vítame medzi nás a dávame ti príležitosť zdielať svoje skúsenosti s celým svetom.</p>


                                </div>
                            </div>
                        </figcaption>
                    </figure>

                    <!-- Image 2 -->
                    <figure>
                        <div class="visual-global relative mt-6">
                            <img  src="{{asset('Images/Pottery_salky.jpg')}}"
                                 alt="A stack of five transparent SAMLA boxes filled with clothes and linen, partially covered by a set of cream drapes."
                                 loading="eager" class="svelte-id538p">
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>






<main class="container mt-6 ">





        @if ($posts->count())
            <div class="col-lg-12">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">NÁŠ NAJNOVŠÍ BLOG </h3>
                <x-blog-ukazka :post="$posts[0]"/>
            </div>
        @endif
    <button>ZOBRAZ VSETKY CLANKY </button>
        <p> </p>




    <!--SPODOK -->
    <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
        <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
            <div class="flex items-center gap-4">
                <a href="https://github.com/sponsors/taylorotwell"
                   class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                    </svg>
                    Sponsor
                </a>
            </div>
        </div>

        <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
            KONTAKTY
        </div>
        <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
            ETICKÝ KÓDEX
        </div>
        <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
            POMOC
        </div>
    </div>


</main>

</body>

</html>
