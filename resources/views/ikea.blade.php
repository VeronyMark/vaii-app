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

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-min.js" defer></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


<!-- relative href DOLEZITE -->
    <base href="https://www.ikea.com/global/en/stories/ideas-inspiration/ikea-storage-school-lesson-2-bedroom-231120/">


<!-- -->
    <link rel="modulepreload"
          href="https://www.ikea.com/global/en/esi/common/fragmentCommon.client-94682164.esm-18h20hg.js">

    <script type="module"
            src="https://www.ikea.com/global/en/esi/common/fragmentCommon.client-94682164.esm-18h20hg.js"></script>

    <script nomodule defer="defer"
            src="https://www.ikea.com/global/en/esi/common/fragmentCommon.client-e7dcdd7e.es5--1qgpurs.js"></script>
    <link rel="preload" href="https://www.ikea.com/global/en/esi/common/styles-8cfbbc77-1a01ihm.css" as="style">
    <link href="https://www.ikea.com/global/en/esi/common/styles-8cfbbc77-1a01ihm.css" rel="stylesheet">
    <script defer="defer" src="https://www.ikea.com/global/en/shared-data/regions.js"></script>

    <script defer="defer" src="https://cdn.cookielaw.org/scripttemplates/otSDKStub.js" charset="UTF-8"
            data-domain-script="80238e1a-3de0-4556-9817-3c9165b937f2"></script>
    <link rel="preconnect" href="https://www.google-analytics.com">
    <script defer="defer" type="text/plain" src="https://www.ikea.com/global/en/esi/common/initGA-6ltum1.js"
            class="optanon-category-C0002" data-ot-category-id="C0002"></script>


    <script src="https://browser.sentry-cdn.com/7.53.1/bundle.min.js"
            integrity="sha384-TAmKuSiw9ilvCDimDNU3n2p9B/TsFLCCBI3zYYxaAwv34hXzH8ghBq/M0SYU/eY9"
            crossorigin="anonymous"></script>
    <script defer="defer" type="text/plain" src="https://www.ikea.com/global/en/esi/common/initSentry--cdcd14.js"
            class="optanon-category-C0002"></script>
    <script defer="defer" type="text/plain" src="https://www.ikea.com/global/en/esi/common/initMPulse--n2sfhk.js"
            class="optanon-category-C0002"></script><!--  build-nr: 20231214.260.2, template-id: 2 -->


    <link rel="preload" href="https://www.ikea.com/global/en/esi/header/styles-cfe186ac--14vdev9.css" as="style">
    <!--  build-nr: 20231128.249.1, template-id: 1 -->
    <link rel="modulepreload"
          href="https://www.ikea.com/global/en/esi/footer/fragmentFooter.client-250a696e.esm--2qvicg.js">
    <script type="module"
            src="https://www.ikea.com/global/en/esi/footer/fragmentFooter.client-250a696e.esm--2qvicg.js"></script>
    <script nomodule defer="defer"
            src="https://www.ikea.com/global/en/esi/footer/fragmentFooter.client-9c2e9d59.es5--1he6n6u.js"></script>
    <link rel="preload" href="https://www.ikea.com/global/en/esi/footer/styles-3012ec7a-16m2jfl.css" as="style">
    <link href="https://www.ikea.com/global/en/esi/footer/styles-3012ec7a-16m2jfl.css" rel="stylesheet">
    <!--  build-nr: 20231211.257.1, template-id: 7 -->
    <link rel="preload" href="styles-2517258f-im13t7.css" as="style">
    <link href="styles-2517258f-im13t7.css" rel="stylesheet">

    <!--! ikea logo-->
    <link rel="shortcut icon" href="https://www.ikea.com/global/en/images/favicon.ico">

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
    <img src="{{ asset('storage/images/2x1qRGpX4feD4xYaxIWaCuxfXlA6L5SWu5DNbLZl.png') }}" alt="ou nou">

    <main class="core-container svelte-xgsrjc">
        <section class="intro-container svelte-1c4i6cb has-animation"
                 style="--text-color:#fff;--overlay-light:0%;--overlay-alpha:0.5;--mobile-alpha:0.3;--play-reserve-space:100px;--play-margin:0 0 0 auto">
            <div class="text-container-left svelte-1c4i6cb">
                <div class="animated-header svelte-1c4i6cb">

                    <h1 class="heading h-l svelte-s0kuyu" style="">
                        <span
                            class="animate-text-part svelte-1c4i6cb" style="--rotate: -10;">tradičné</span>
                        <span
                            class="animate-text-part svelte-1c4i6cb mt-5"
                            style="--rotate: 8; --move-y: -6;">REMESLÁ </span>

                        <span
                            class="animate-text-part svelte-1c4i6cb mt-4"
                            style="--rotate: -10; --move-y: 6;">moderne</span>
                    </h1>

                </div>
            </div>

            <div class="visual-container svelte-1c4i6cb has-animation">
                <img style="object-position: 50% 50%;"
                     src="{{asset('Images/modrotlac.jpg')}}"
                     alt="Uvodná strana"
                     sizes="(min-width: 768px) 50vw, 100vw"
                     loading="eager"
                     class="svelte-1ujc5pi"/>
            </div>

        </section>
        <div style="" class="group svelte-15bqzu1">
            <div class="svelte-15bqzu1">
                <div class="svelte-wwm3ml height-100" style="--max-width:80ch;">
                    <div class="richtext-container svelte-1siyejh align-items-center justify-start">
                        <div class="richtext global-content-links global-content-lists svelte-1siyejh" style="">

                            <p class="p-xl">
                                <span>
                                    Vitajte v svete tradičných ľudových remesiel na Slovensku!
                                    Naša krajina, s bohatou históriou a rozmanitým kultúrnym dedičstvom, nesie v sebe poklady, ktoré sa prenášajú z generácie na generáciu prostredníctvom tradičných remesiel.
                                    Tento blog sa zameriava na oživenie a zachovanie krásy a jedinečnosti ľudových remesiel, ktoré sú zároveň srdcom našej kultúry.
                                    Budeme venovať rôznym oblastiam tradičných remesiel, od kováčstva cez vyšívanie až po výrobu tradičných ľudových hračiek.
                                    Stretávame sa s remeselníkmi, ktorí svojimi zručnosťami a vášňou prenášajú odkaz minulosti do súčasnosti.
                                    Bude to cesta časom, pri ktorej spolu objavíme krásu tradícií a ich význam v dnešnom rýchlo meniacom sa svete.
                                    Vítajte medzi nami na tejto ceste objavovania tradičných ľudových remesiel na Slovensku!
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- -->

        <div class="header-group svelte-owj1zo"
             style="--split-scroll-sticky: sticky; --split-scroll-height: fit-content;">
            <div class="splitscroll-header svelte-1l0vv2c">
                <div class="header svelte-1l0vv2c">
                    <div style="" class="group svelte-15bqzu1">
                        <div class="svelte-15bqzu1">
                            <div class="svelte-wwm3ml height-100" style="--max-width:60ch;">
                                <div class="richtext-container svelte-1siyejh align-items-center justify-start">
                                    <div class="richtext global-content-links global-content-lists svelte-1siyejh"
                                         style="">
                                        <h3 class="h-s"><strong>PRIHLÁSTE </strong><em><strong>alebo</strong></em>
                                            <strong>REGISTRUJE SA pre pridanie príspevkov!</strong></h3>
                                        <p>Pridajte sa k nám a začnite písať svoje vlastné texty a blogy! 📝
                                            Vytvorme spolu miesto, kde sa zdieľa láska k slovu a myšlienkam. Čakáme na
                                            vaše príspevky s nádejou a
                                            očakávaním! 🛠️💬</p>
                                        <p> Zaregistrujte sa ešte dnes a pridajte svoj jedinečný príbeh do našej
                                            zbierky! 🌿🌟</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-group svelte-owj1zo switch-side">
                <div style="" class="group svelte-15bqzu1">
                    <div class="svelte-15bqzu1">
                        <figure>
                            <div class="visual-global relative svelte-id538p"><img
                                    src="https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg"
                                    srcset="https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg?f=g 2000w, https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg?f=sg 1600w, https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg?f=xxxl 1400w, https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg?f=xxl 1100w, https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg?f=xl 900w, https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg?f=l 750w, https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg?f=m 700w, https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg?f=s 600w, https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg?f=xs 500w, https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg?f=xxs 400w, https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg?f=xxxs 300w, https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg?f=u 160w, https://www.ikea.com/global/en/images/PH_186322_3_d54bd20b76.jpg?f=xu 80w"
                                    sizes="(max-width: 1440px) 100vw, 1440px" style="object-position: 50% 50%"
                                    alt="A small bedroom with a dressed bed in front of slightly parted curtains covering a wardrobe system. "
                                    loading="eager" width="1500" height="2000" class="svelte-id538p">
                            </div>
                            <figcaption class="p-m svelte-1tigf3m">
                                <div class="richtext-container svelte-1siyejh align-items-left">
                                    <div
                                        class="richtext global-content-links global-content-lists svelte-1siyejh inherit-font"
                                        style=""><p>Shifting your bed in front of your clothing storage might sound
                                            outlandish at first (and flat out outrageous if you’re short on space), but
                                            hear us out! The simple addition of curtains makes for a soft backdrop and
                                            divide, hides your cupboards and drawers, and saves on space as you no
                                            longer need the swing of solid wardrobe doors.&nbsp;</p></div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>


                <div style="" class="group svelte-15bqzu1">
                    <div class="svelte-15bqzu1">
                        <figure>
                            <div class="visual-global relative svelte-id538p"><img
                                    src="https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg"
                                    srcset="https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg?f=g 2000w, https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg?f=sg 1600w, https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg?f=xxxl 1400w, https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg?f=xxl 1100w, https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg?f=xl 900w, https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg?f=l 750w, https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg?f=m 700w, https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg?f=s 600w, https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg?f=xs 500w, https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg?f=xxs 400w, https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg?f=xxxs 300w, https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg?f=u 160w, https://www.ikea.com/global/en/images/PH_186180_1_dfd4499c8f.jpg?f=xu 80w"
                                    sizes="(max-width: 1440px) 100vw, 1440px" style="object-position: 50% 50%"
                                    alt="A stack of five transparent SAMLA boxes filled with clothes and linen, partially covered by a set of cream drapes."
                                    loading="eager" width="1500" height="2000" class="svelte-id538p">
                            </div>

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
                                    <div ><h3 class="h-m h-s">
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
        <div >

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
<div class="fragment-mounter unmounted" data-fragment-id="fragment-footer-7">
    <footer
        style="--footer-background-color-default:#0058a3;--footer-text-color-default:#ffffff;--footer-clock-scale-default:1;--footer-clock-pos-x-default:0px;--footer-clock-pos-y-default:0px"
        class="svelte-124nqci">
        <div class="top-content svelte-124nqci"><span class="svelte-124nqci">A world of inspiration for your home</span>
            <img src="https://www.ikea.com/global/en/images/ikea-logo.svg" loading="lazy" width="153" height="61"
                 alt="IKEA Logo" class="svelte-124nqci"></div>
        <div class="room-container svelte-124nqci">
            <div class="room-images svelte-124nqci"><img class="room-image-lights svelte-124nqci"
                                                         src="https://www.ikea.com/global/en/images/footer-lights.svg"
                                                         aria-hidden="true" loading="lazy" width="1950" height="320"
                                                         alt="Illustration of a room with IKEA products: chairs, tables, storage units, lighting and wall art">
                <span class="clock svelte-124nqci"><div class="clock svelte-fxvflo" aria-hidden="true"><div
                            class="clock__hour svelte-fxvflo" style="--clockInitial:305deg"></div><div
                            class="clock__minute svelte-fxvflo" style="--clockInitial:60deg"></div><div
                            class="clock__second svelte-fxvflo" style="--clockInitial:0deg"></div></div></span></div>
            <div class="light-switches svelte-124nqci">
                <button class="light-switch svelte-124nqci" tabindex="-1"><span class="sr-only svelte-124nqci">Toggle light switch</span>
                    <img alt="Light Switch" aria-hidden loading="lazy"
                         src="https://www.ikea.com/global/en/images/smart-home.svg"> <img alt="Light Switch" aria-hidden
                                                                                          loading="lazy"
                                                                                          class="spark svelte-124nqci"
                                                                                          src="https://www.ikea.com/global/en/images/smart-home_hover.svg">
                </button>
                <button class="light-switch svelte-124nqci"><span
                        class="sr-only svelte-124nqci">Toggle light switch</span> <img alt="Light Switch" aria-hidden
                                                                                       loading="lazy"
                                                                                       src="https://www.ikea.com/global/en/images/smart-home.svg">
                    <img alt="Light Switch" aria-hidden loading="lazy" class="spark svelte-124nqci"
                         src="https://www.ikea.com/global/en/images/smart-home_hover.svg"></button>
                <button class="light-switch svelte-124nqci" tabindex="-1"><span class="sr-only svelte-124nqci">Toggle light switch</span>
                    <img alt="Light Switch" aria-hidden loading="lazy"
                         src="https://www.ikea.com/global/en/images/smart-home.svg"> <img alt="Light Switch" aria-hidden
                                                                                          loading="lazy"
                                                                                          class="spark svelte-124nqci"
                                                                                          src="https://www.ikea.com/global/en/images/smart-home_hover.svg">
                </button>
            </div>
        </div>
        <div class="bottom-content svelte-124nqci">
            <div class="links svelte-124nqci"><a href="https://www.ikea.com/global/en/international-sales/"
                                                 class="svelte-124nqci">International Sales </a><a
                    href="https://www.inter.ikea.com/" class="svelte-124nqci">Inter IKEA Group </a><a
                    href="https://ikeafoundation.org/" class="svelte-124nqci">IKEA Foundation </a><a
                    href="https://ikeamuseum.com/en/" class="svelte-124nqci">IKEA Museum </a><a
                    href="https://www.ikea.com/global/en/more-information/" class="svelte-124nqci">FAQs</a></div>
            <div class="end-copy svelte-124nqci">
                <div class="left-links svelte-124nqci">
                    <button class="svelte-124nqci">Cookie settings</button>
                </div>
                <div class="copy-right svelte-124nqci"><p class="svelte-124nqci">© Inter IKEA Systems B.V. 1999 -
                        2023</p></div>
                <div class="right-links svelte-124nqci"><a
                        href="https://www.ikea.com/global/en/privacy/privacy-cookie-statement/" class="svelte-124nqci">Privacy
                        &amp; Cookie statement</a></div>
            </div>
        </div>
    </footer>
</div><!--  build-nr: 20231211.257.1, template-id: 7 -->
<script type="text/javascript" src="/nuuQuxBW1dnO/v8/pi8Mb7wyAQ/DuDiVhcuf1OuDa/URFBPSwC/MU8nKwg9/Z0A"></script>
</body>
</html><!--  build-nr: 20231222.274.1, template-id: 31 -->
