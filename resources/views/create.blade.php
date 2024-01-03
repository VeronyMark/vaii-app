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
        <div class="container h-100 mt-5">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">
                    <h3>PRIDAJ ČLÁNOK</h3>
                    <form action="{{ route('posts.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">NÁDPIS</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="body">ČLÁNOK</label>
                            <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">PRIDAJ ČLÁNOK </button>
                        <a class="btn btn-light hover:bg-blue-500" href="{{ route('create') }}">Add Post</a>

                    </form>
                </div>
            </div>
        </div>
    </article>
</main>
</body>
</html>
