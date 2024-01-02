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

</head>

<body>


<div class="container">
    <header class="blog-header py-5   ">
        <div id="headerSubPages">
            <div class="col-4 "></div>

            <div class="col-4 text-center">
                <img src="{{ asset('Images/logo/default-monochrome.svg') }}" alt="Logo" class="img-fluid">
            </div>

            <div class="col-4 d-flex justify-content-center  ">
                <nav class="navbar navbar-expand-lg">
                    @guest
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a href="/" class="btn btn-dark">Domov
                                </a>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-black" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-label">
                                    <i class="bi bi-person-circle"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-label">
                                    <li><a class="dropdown-item" href="/login">Prihlásenie</a></li>
                                    <li><a class="dropdown-item" href="/register">Registrácia</a></li>
                                </ul>
                            </li>
                            @else
                        </ul>
                        <span class=" text-center fw-bold text-uppercase ms-3 me-2" style="color: #757575;">Vitaj, {{auth()->user()->name}} !</span>


                        <form method="POST" action="/logout" class=" fw-bold  ">
                            @csrf
                            <button type="submit" class="btn btn-danger">Odlásenie</button>
                        </form>

                    @endguest


                </nav>
            </div>
        </div>
    </header>
</div>

<main class="container mt-6 ">


    <article>

        <h2> {{$post->title}}</h2>

        <p style="color:grey ">{{$post->created_at->diffForHumans()}} <a href="#">{{$post->author->name}} </a></p>

        <p style="color:grey "><a href="/categories/{{$post->category->slug}}">{{$post->category->name}} </a></p>

        <!-- <p> <a href="/"></a> Spať na hlavnú stránku</p> -->

        <p><strong>
                {{$post->excerpt}}
            </strong></p>

        <hr>

        <p>
            {{$post->body}}
        </p>



    </article>


</main>


<!-- NEWSLETTERS-->
<footer>
    <div style="background-image: url('{{ asset('../../Images/vcelarstco.jpg') }}'); background-size: cover;">
        <div class="row justify-content-center">
            <div class="col-8 p-md-5 mb-5 mt-5  text-black rounded  bg-white">
                <h1 class="display-4 fst-italic  ">NEWSLETTER</h1>

                <p class="lead my-3 fst-italic" style="font-size: 24px; "> Prihláste sa do nášho newslettra a buďte v
                    obraze!</p>

                <input type="email" name="email" placeholder="  zadaj svoj e-mail" required>
                <button type="button" class="btn btn-dark">ODOŠLI</button>
            </div>
        </div>
    </div>
</footer>


</body>

</html>
