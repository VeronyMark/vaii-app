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


<div class="sm:fixed sm:top-0 sm:right-0  flex items-center ">
    @auth
        <span class="text-center font-bold text-uppercase text-gray-600">{{ auth()->user()->name }}, Vitaj!</span>

        <form method="get" action="/create" class="font-bold">
            @csrf
            <button type="submit" class="btn btn-danger ml-4">Add Post</button>
        </form>

           <!-- <a href="{{ route('create') }}" method="post" class="btn btn-light hover:bg-blue-500 ml-4"></a> -->

        <form method="POST" action="/logout" class="font-bold">
            @csrf
            <button type="submit" class="btn btn-danger ml-4">Odlásenie</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900">Register</a>
        @endif
    @endauth
</div>


<main class="container">
    <div class="row ">
        <!-- Ľavý panel -->
        <div class="col-md-4">
            <div class="position-sticky" style="top:2rem;">
                <div class="p-4 mb-3 bg-light rounded-top">
                    <h4>O nás</h4>
                    <p class="mb-0"> Vitajte na našom blogu, kde objavujeme fascinujúci svet remesiel, inšpirácie z
                        minulosti a užitočné triky pre všetkých remeselníkov. Ak ste zvedaví na tradičné zručnosti,
                        ktoré prežili stáročia a tvoria našu kultúrnu dedičinu, tak ste na správnom mieste. Naše
                        blogy
                        vám poskytnú zaujímavý pohľad na rôzne remeselné techniky a prinesú vám inšpiráciu, aby ste
                        aj
                        vy mohli objaviť svoju kreativitu. Nielenže sa zameriame na zručnosti a tipy pre
                        začiatočníkov,
                        ale tiež sa pohráme s históriou, aby sme vám priblížili, ako sa remeslá vyvíjali v priebehu
                        času. Spolu objavíme krásu tradičných remesiel a vytvoríme prepojenie medzi minulosťou a
                        súčasnosťou. Poďte s nami na cestu do sveta remeselníkov a ich dovedností.</p>
                </div>
                <div class="p-4">
                    <h4>Archív</h4>
                    <ol class="list-unstyled mb-0">
                        <!-- Tu pridajte odkazy na kategórie -->
                        <li><a href="#">Hrnčiarstvo</a></li>
                        <li><a href="#">Modrotlač</a></li>
                        <li><a href="#">Umelecké šperkárstvo</a></li>
                        <li><a href="#">Včelárstvo</a></li>
                        <li><a href="#">Výstavné rezbárstvo</a></li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Pravý panel s článkami -->
        <div class="col-md-8" style="margin-top: 100px;">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">UVEREJNENÉ BLOGY </h3>
            @if ($posts->count()>1)
                <div> <!--c lass="row mb-4"> -->
                    @foreach($posts->skip(1) as $postik)
                        <x-blog-ukazka :post="$postik"/>
                    @endforeach
                </div>
            @else
                <p class="text-center">Zatiaľ nebol pridaný žiaden post</p>
            @endif
        </div>
    </div>


</main>


</div>

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

</body>
</html>
