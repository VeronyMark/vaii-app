<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
        }

        .fixed-text {
            width: 40%;
            position: sticky;
            top: 10vh; /* Adjust the initial position */
            padding: 20px;
            background-color: #f8f9fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .scrolling-images {
            width: 60%;
            overflow-y: auto;
            padding: 20px;
        }

        .scrolling-images img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

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

    <div class="container-fluid">
        <div class="row">
            <!-- Left Side: Fixed Header -->
            <div class="fixed-text">
                <h2>The magic of the forgotten spot</h2>
                <p>If you’re looking for more room, go vertical...</p>
                <!-- Add your additional fixed text content here -->
            </div>

            <!-- Right Side: Scrolling Images -->
            <div class="col-lg-6 scrolling-images">
                 <img src="https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg" alt="Image 1">
            <img src="https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg" alt="Image 2">
            <img src="https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg" alt="Image 1">
            <img src="https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg" alt="Image 2">
            <img src="https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg" alt="Image 1">
            <img src="https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg" alt="Image 2">
            <img src="https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg" alt="Image 1">
            <img src="https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg" alt="Image 2">

            </div>
        </div>
    </div>

    <!--  <div class="container">
        <div class="scrolling-images">
            <img src="https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg" alt="Image 1">
            <img src="https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg" alt="Image 2">
            <img src="https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg" alt="Image 1">
            <img src="https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg" alt="Image 2">
            <img src="https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg" alt="Image 1">
            <img src="https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg" alt="Image 2">
            <img src="https://www.ikea.com/global/en/images/PH_191753_cc7af19d73.jpg" alt="Image 1">
            <img src="https://www.ikea.com/global/en/images/PH_191754_c666d90a39.jpg" alt="Image 2">
           - Add more images as needed
        </div>
    </div>
    -->
</main>

<script>
    window.addEventListener('scroll', function () {
        var fixedText = document.querySelector('.fixed-text');
        var scrollingImages = document.querySelector('.scrolling-images');
        var lastImage = scrollingImages.querySelector('img:last-child');
        var lastImageBottom = lastImage.getBoundingClientRect().bottom;

        if (lastImageBottom <= window.innerHeight) {
            fixedText.style.position = 'fixed';
            fixedText.style.top = '0vh'; /* Adjust the initial position */
        } else {
            fixedText.style.position = 'static';
            fixedText.style.top = 'auto';
        }
    });
</script>

</body>
</html>
