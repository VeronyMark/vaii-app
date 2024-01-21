<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <title>TRM-blog </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Your custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


<body>


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
                            <button class=" btn btn-dark  mx-auto d-block  "
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

                                    <li><a class="dropdown-item" href="#">Informácie o profile</a></li>

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

<main class="container mt-6 ">

    <!-- POST       -->
    <article>

        @if(session()->has('statusKomentOk'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session()->get('statusKomentOk') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @elseif(session()->has('statusKomentDelete'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session()->get('statusKomentDelete') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <button class="btn btn-dark btn-lg mx-auto d-block mt-4 mb-5"
                onclick="window.location.href='{{ route("welcome") }}'">ZOBRAZ VŠETKY BLOGY
        </button>
        <h2 class="post-title" contenteditable="true" data-type="title">{{$post->title}}</h2>


        <p style="color:grey ">{{$post->created_at->diffForHumans()}} <strong>{{$post->author->name}}</strong></p>

        <p style="color:grey "><a href="/categories/{{$post->category->slug}}"
                                  style="color: #2d3748">{{$post->category->name}} </a></p>

        <div class="row">
            <div class="col-md-6"> <!-- Adjust column size as needed -->
                <form method="post" action="{{ route('post.delete', ['post' => $post]) }}">
                    @csrf
                    @method('delete')
                    @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id() == $post->user_id)
                        <button type="submit" class="deleteComment btn btn-sm btn-outline-danger">Zmaž</button>
                    @endif
                </form>


            </div>
            <div class="col-md-6">
                @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id() == $post->user_id)

                    <button type="button" class="btn btn-primary editPost">edit</button>
                @endif

            </div>
            <button id="saveChangesBtn" class="btn btn-success d-none">Save Changes</button>


            <!--  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Update Post
    </button>
-->

        </div>
        <div class="post-excerpt" style="word-wrap: break-word; max-width: 600px; padding: 10px;" contenteditable="true"
             data-type="excerpt">
            <span style="font-weight: bold;">{!! $post->excerpt !!}</span>
        </div>
        <hr>
        <div class="post-body" style="word-wrap: break-word; max-width: 600px; padding: 10px;" contenteditable="true"
             data-type="body">
            {{$post->body}}
        </div>

        <div class="mt-16">
            @if($post->image)
                <img src="{{ asset('images/'.$post->image) }}" alt="ilustracny obrazok k postu"
                     sizes="(max-width: 1440px) 100vw, 1440px" style="object-position: 50% 50%"
                     width="2000" height="1282">
            @endif
        </div>

        <section class="col-md-8 offset-md-2 mt-5 mb-4">
            <form method="POST" action="/posts/{{ $post->slug}}/comments" class="bg-light border rounded p-4">


                <header class="d-flex align-items-center">
                    <!--    guest
                            <img  src="https://i.pravatar.cc/60" alt="" width="40" height="40" class="rounded-circle mr-2">
                        else
                            <img src="https://i.pravatar.cc/60?u={ auth()->user()->id }}" alt="" width="40" height="40" class="rounded-circle mr-2">
                        endguest -->
                    @guest
                        <h2 class="ml-2">Na pridanie komentáru je potrebné prihlásenie</h2>
                    @else
                        <h2 class="ml-2">Chceš zanechať komentár?</h2>

                    @endguest
                </header>

                <div class="mt-2">
                    @guest
                        <textarea name="body" class="form-control" rows="4"
                                  readonly placeholder="Napíš nám svoj názor"></textarea>
                    @else
                        <textarea name="body" class="form-control" rows="4"
                                  placeholder="Napíš nám svoj názor"></textarea>
                    @endguest

                </div>

                <div class="justify-end mt-3 border-t ">
                    @auth
                        @csrf
                        <button type="submit" class="btn btn-dark">ZDIEĽAJ</button>
                    @endauth
                </div>
            </form>


            @foreach ($post->comments as $comment)
                <div class="card mt-3">
                    <div class="card-body">
                        <x-comment :comment="$comment"/>
                        @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id() == $comment->user_id)
                            <button type="button" class="deleteKoment btn btn-sm btn-outline-danger" data-comment-id="{{ $comment->id }}">
                                Zmaž Komentár
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach


        </section>


    </article>


    <footer>

        <div class="mt-16"
             style=" background-image: url('{{ asset('../../Images/vcelarstvo.jpg') }}'); background-size: cover;">
            <div class="row justify-content-center">
                <div class="col-8 p-md-5 mb-5 mt-5  text-black rounded  bg-white">

                    <p class="lead my-3 fst-italic" style="font-size: 24px; "> TEŠÍME SA NA KAŽDÝ PRÍBEH, KTORÝ S NAMI ZDIEĽAŠ </p>


                        @auth
                        <form method="get" action="/create" class="font-bold">
                            @csrf
                            <button type="submit" class="btn btn-secondary mb-4">Pridaj príspevok</button>
                        </form>
                    @endauth


                </div>
            </div>
        </div>

    </footer>
</main>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- Add a Save Changes button -->

<script>
    $(document).ready(function () {
        // Event handler for the "Edit" button
        $(document).on('click', '.editPost', function (e) {
            // You may want to add the logic to open the edit modal here
            console.log('Edit button clicked');

            // Highlight the editable elements
            $('[contenteditable="true"]').addClass('editable');

            // Show the Save Changes button
            $('#saveChangesBtn').removeClass('d-none');
        });

        // Event handler for the "Save Changes" button
        $(document).on('click', '#saveChangesBtn', function (e) {
            var postId = {{$post->id}};
            var data = {};

            // Loop through editable elements and collect updated content
            $('[contenteditable="true"]').each(function () {
                var type = $(this).data('type');

                if (type === 'title') {
                    data['title'] = $(this).text();
                } else if (type === 'excerpt') {
                    data['excerpt'] = $(this).text();
                } else if (type === 'body') {
                    data['body'] = $(this).text();
                }

                // Remove the editable class
                $(this).removeClass('editable');
            });

            // Send AJAX request to update the content
            $.ajax({
                type: "PUT",
                url: "/update-post/" + postId,
                data: data,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    // You can handle the success response if needed
                    console.log('Post updated successfully');
                },
                error: function (error) {
                    console.error('Error updating post:', error);
                }
            });

            // Hide the Save Changes button
            $('#saveChangesBtn').addClass('d-none');
        });

    });
</script>




