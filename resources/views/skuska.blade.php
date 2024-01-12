<!doctype html>
<html lang="en">
<head><title>Boost your bedroom storage – IKEA Global</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/ikea.css') }}" rel="stylesheet">




    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- relative href DOLEZITE -->
    <base href="https://www.ikea.com/global/en/stories/ideas-inspiration/ikea-storage-school-lesson-2-bedroom-231120/">





   <!--OBRAZKY -->
    <link href="styles-2517258f-im13t7.css" rel="stylesheet">

    <!--! ikea logo-->
    <link rel="shortcut icon" href="https://www.ikea.com/global/en/images/favicon.ico">

    <style>
        .scrolling-images {
            overflow-y: auto;
            max-height: 100vh;
        }

        .scrolling-images img {
            width: 100%;
            height: auto;
        }
    </style>
</head>


<body class="core core-intro bright">


<div>
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <!--  PRIHLASENY       -->
                <a href="{{ url('/dashboard') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                <!--to do over -->
                <span class=" text-center fw-bold text-uppercase ms-3 me-2" style="color: #757575;">Vitaj, {{auth()->user()->name}} !</span>

            @else

                <button type="submit" class="btn btn-dark">PRIDAJ BLOG</button>

                <a class="btn btn-light hover:bg-blue-500" href="{{ route('create') }}">Add Post</a>


                <!-- <form method="POST" action="{ route('posts.create')}}">
                     <button type="button" class="btn btn-light hover:bg-blue-500">PRIDAJ BLOG</button>
                 </form>
-->
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


</div>


<div id="mountId">
    <main class="core-container svelte-xgsrjc">

        <!-- UVOD -->
        <div class="container-fluid">
            <div class="row">
                <!-- Left Side: Larger Picture -->
                <div class="col-lg-6">
                    <div class="visual-container svelte-1c4i6cb has-animation" style="height: 100vh; overflow: hidden;">
                        <img style="object-fit: cover; width: 100%; height: 100%;"
                             src="{{asset('Images/modrotlac.jpg')}}"
                             alt="Uvodná strana"
                             loading="eager"
                             class="svelte-1ujc5pi"/>
                    </div>
                </div>

                <!-- Right Side: Text -->
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <h1>tradičné</h1>
                        <h1 class="mt-4">REMESLÁ</h1>
                        <h1 class="mt-4">moderne</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- text -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <p class="lead">
                        Vitajte v svete tradičných ľudových remesiel na Slovensku!
                        Naša krajina, s bohatou históriou a rozmanitým kultúrnym dedičstvom, nesie v sebe poklady, ktoré sa prenášajú z generácie na generáciu prostredníctvom tradičných remesiel.
                        Tento blog sa zameriava na oživenie a zachovanie krásy a jedinečnosti ľudových remesiel, ktoré sú zároveň srdcom našej kultúry.
                        Budeme venovať rôznym oblastiam tradičných remesiel, od kováčstva cez vyšívanie až po výrobu tradičných ľudových hračiek.
                        Stretávame sa s remeselníkmi, ktorí svojimi zručnosťami a vášňou prenášajú odkaz minulosti do súčasnosti.
                        Bude to cesta časom, pri ktorej spolu objavíme krásu tradícií a ich význam v dnešnom rýchlo meniacom sa svete.
                        Vítajte medzi nami na tejto ceste objavovania tradičných ľudových remesiel na Slovensku!
                    </p>
                </div>
            </div>
        </div>

        <!--HUV -->
        <div class="container-fluid">
            <div class="row">
                <!-- Left Side: Fixed Header -->
                <div class="col-lg-6">
                    <div class="header-group">
                        <div class="splitscroll-header">
                            <div class="header">
                                <div class="group">
                                    <div>
                                        <h3 class="h-m h-s"><strong>The magic of the forgotten spot</strong></h3>
                                        <p>If you’re looking for more room, go vertical...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Scrolling Images -->
                <div class="col-lg-6 scrolling-images">
                    <img src="https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg" alt="Image 1">
                    <img src="https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg" alt="Image 2">
                    <!-- Add more images as needed -->
                </div>
            </div>
        </div>

        <!-- NA LAVEJ STRANE -->
        <div class="header-group svelte-owj1zo"
             style="--split-scroll-sticky: sticky; --split-scroll-height: fit-content;">
            <div class="splitscroll-header svelte-1l0vv2c">
                <div class="header svelte-1l0vv2c">
                    <div style="" class="group svelte-15bqzu1">
                        <div class="svelte-15bqzu1">
                            <div class="svelte-wwm3ml height-100" style="--max-width:60ch;">
                                <div class="richtext-container svelte-1siyejh align-items-center justify-center">
                                    <div class="richtext global-content-links global-content-lists svelte-1siyejh"
                                         style=""><h3 class="h-m h-s">
                                            <span><strong>The magic of the forgotten spot</strong></span></h3>
                                        <p><span>If you’re looking for more room, go vertical. And not just up, but down too. Under the bed and on top of taller units live underutilised space just begging for a purpose. It’s not simply about finding the physical space, but the right piece for the task. Now you can take advantage of these hidden, dusty gems in an organised way.</span>
                                        </p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-group svelte-owj1zo">
                <div style="" class="group svelte-15bqzu1">
                    <div class="svelte-15bqzu1">
                        <figure>
                            <div class="visual-global relative svelte-id538p"><img
                                    src="https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg"
                                    srcset="https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=g 2000w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=sg 1600w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xxxl 1400w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xxl 1100w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xl 900w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=l 750w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=m 700w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=s 600w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xs 500w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xxs 400w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xxxs 300w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=u 160w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xu 80w"
                                    sizes="(max-width: 1440px) 100vw, 1440px" style="object-position: 50% 50%"
                                    alt="A bedroom with two FREDVANG underbed storage/bedside tables under a bed in front of wardrobes with shoe storage on top."
                                    loading="eager" width="1500" height="2000" class="svelte-id538p"></div>
                        </figure>
                    </div>
                </div>
                <div style="" class="group svelte-15bqzu1">
                    <div class="svelte-15bqzu1">
                        <figure>
                            <div class="visual-global relative svelte-id538p"><img
                                    src="https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg"
                                    srcset="https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=g 2000w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=sg 1600w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xxxl 1400w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xxl 1100w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xl 900w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=l 750w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=m 700w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=s 600w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xs 500w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xxs 400w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xxxs 300w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=u 160w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xu 80w"
                                    sizes="(max-width: 1440px) 100vw, 1440px" style="object-position: 50% 50%"
                                    alt="A FREDVANG underbed storage/bedside table pulled out from under a bed, filled with books and clothes."
                                    loading="eager" width="1500" height="2000" class="svelte-id538p"></div>
                            <figcaption class="p-m svelte-1tigf3m">
                                <div class="richtext-container svelte-1siyejh align-items-left">
                                    <div
                                        class="richtext global-content-links global-content-lists svelte-1siyejh inherit-font"
                                        style=""><p>This FREDVANG underbed storage unit makes for seamless organisation,
                                            especially in a small bedroom where dual-purpose pieces are a must. Roll it
                                            out at bedtime and roll it back under in the morning.</p></div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <!-- -->

        <!-- NA LAVEJ STRANE -->
        <div class="header-group svelte-owj1zo"
             style="--split-scroll-sticky: sticky; --split-scroll-height: fit-content;">
            <div class="splitscroll-header svelte-1l0vv2c">
                <div class="header svelte-1l0vv2c">
                    <div style="" class="group svelte-15bqzu1">
                        <div class="svelte-15bqzu1">
                            <div class="svelte-wwm3ml height-100" style="--max-width:60ch;">
                                <div><h3 class="h-m h-s">
                                        <span><strong>The magic of the forgotten spot</strong></span></h3>
                                    <p>
                                        <span>If you’re looking for more room, go vertical. And not just up, but down too. Under the bed and on top of taller units live underutilised space just begging for a purpose. It’s not simply about finding the physical space, but the right piece for the task. Now you can take advantage of these hidden, dusty gems in an organised way.</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-group svelte-owj1zo">
                <div style="" class="group svelte-15bqzu1">
                    <div class="svelte-15bqzu1">
                        <figure>
                            <div class="visual-global relative svelte-id538p"><img
                                    src="https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg"
                                    srcset="https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=g 2000w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=sg 1600w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xxxl 1400w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xxl 1100w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xl 900w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=l 750w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=m 700w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=s 600w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xs 500w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xxs 400w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xxxs 300w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=u 160w, https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg?f=xu 80w"
                                    sizes="(max-width: 1440px) 100vw, 1440px" style="object-position: 50% 50%"
                                    alt="A bedroom with two FREDVANG underbed storage/bedside tables under a bed in front of wardrobes with shoe storage on top."
                                    loading="eager" width="1500" height="2000" class="svelte-id538p"></div>
                        </figure>
                    </div>
                </div>
                <div style="" class="group svelte-15bqzu1">
                    <div class="svelte-15bqzu1">
                        <figure>
                            <div class="visual-global relative svelte-id538p"><img
                                    src="https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg"
                                    srcset="https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=g 2000w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=sg 1600w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xxxl 1400w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xxl 1100w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xl 900w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=l 750w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=m 700w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=s 600w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xs 500w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xxs 400w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xxxs 300w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=u 160w, https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg?f=xu 80w"
                                    sizes="(max-width: 1440px) 100vw, 1440px" style="object-position: 50% 50%"
                                    alt="A FREDVANG underbed storage/bedside table pulled out from under a bed, filled with books and clothes."
                                    loading="eager" width="1500" height="2000" class="svelte-id538p"></div>
                            <figcaption class="p-m svelte-1tigf3m">
                                <div class="richtext-container svelte-1siyejh align-items-left">
                                    <div
                                        class="richtext global-content-links global-content-lists svelte-1siyejh inherit-font"
                                        style=""><p>This FREDVANG underbed storage unit makes for seamless organisation,
                                            especially in a small bedroom where dual-purpose pieces are a must. Roll it
                                            out at bedtime and roll it back under in the morning.</p></div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <!-- -->


        <!-- POSLEDNY OBRAZOK -->
        <div>

            <img
                src="https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg"
                srcset="https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg?f=g 2000w, https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg?f=sg 1600w, https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg?f=xxxl 1400w, https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg?f=xxl 1100w, https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg?f=xl 900w, https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg?f=l 750w, https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg?f=m 700w, https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg?f=s 600w, https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg?f=xs 500w, https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg?f=xxs 400w, https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg?f=xxxs 300w, https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg?f=u 160w, https://www.ikea.com/global/en/images/PH_179651_8c30bf1254.jpg?f=xu 80w"
                sizes="(max-width: 1440px) 100vw, 1440px" style="object-position: 50% 50%"
                alt="A bedroom with a bed in front of a white shelving unit holding books, plants, boxes and other decorations set against a wall."
                width="2000" height="1282" class="svelte-id538p">

        </div>
        <!-- -->


        <!--SPODOK  -->
        <div style="--layout-background: #fedb00; --layout-color: #111111;--next-up-bg-color:#fedb00"
             class="group svelte-15bqzu1 colors next-has-layout-spacing colors-start">
            <div class="svelte-15bqzu1">
                <div class="svelte-wwm3ml height-100" style="--max-width:60ch;">
                    <div class="richtext-container svelte-1siyejh align-items-center justify-center">
                        <div class="richtext global-content-links global-content-lists svelte-1siyejh" style=""><h3
                                class="h-m" style="text-align:center;"><strong>And there you go – even a small bedroom
                                    can have it all!</strong></h3>
                            <p style="text-align:center;"><br>You can tick lesson two of our storage school off your
                                to-do list and are invited to learn more about our range of storage solutions at your
                                local IKEA website. Sweet dreams!</p></div>
                    </div>
                </div>
            </div>
        </div>
        <div
            style="--layout-background: #fedb00; --layout-color: #111111;--layout-spacing-desktop: 50px;--layout-spacing-tablet: 30px;--layout-spacing-mobile: 20px;"
            class="group svelte-15bqzu1 colors colors-end">
            <div class="svelte-15bqzu1">
                <div class="btn-container svelte-zdmw3i btn-container--center"></div>
            </div>
        </div>
    </main>
</div>
<script type="text/javascript" src="/nuuQuxBW1dnO/v8/pi8Mb7wyAQ/DuDiVhcuf1OuDa/URFBPSwC/MU8nKwg9/Z0A"></script>
</body>
</html><!--  build-nr: 20231222.274.1, template-id: 31 -->
