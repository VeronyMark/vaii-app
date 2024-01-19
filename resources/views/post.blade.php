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

        <h2 class="post-title">{{$post->title}}</h2>



        <p style="color:grey ">{{$post->created_at->diffForHumans()}} <strong>{{$post->author->name}}</strong></p>

        <p style="color:grey "><a href="/categories/{{$post->category->slug}}">{{$post->category->name}} </a></p>

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

                    <!--  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Update Post
            </button>
-->

        </div>


        <div  class="post-excerpt" style="word-wrap: break-word; max-width: 600px; padding: 10px;">
            <strong>{{$post->excerpt}}</strong>
        </div>
        <hr>
        <div class="post-body" style="word-wrap: break-word; max-width: 600px; padding: 10px;">
            {{$post->body}}
        </div>



        <section class="col-md-8 offset-md-2 mt-4 mb-4">
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

                <div class="mt-3">
                        <textarea name="body" class="form-control" rows="4"
                                  placeholder="Napíš nám svoj názor"></textarea>
                </div>

                <div class="justify-end mt-3 border-t ">
                    @auth
                        @csrf
                        <button type="submit" class="btn btn-dark">ZDIEĽAJ</button>
                    @endauth
                </div>
            </form>
<!-- -->

            @foreach ($post->comments as $comment)
            <div class="card mt-3">
                <div class="card-body">
                    <x-comment :comment="$comment"/>
                </div>
            </div>
            @endforeach


        </section>



    </article>

    <!-- Modal UPDATE MODAL-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="update_title">Title</label>
                        <input type="text" class="form-control" id="update_title" name="title"
                               value="{{ $post->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="update_excerpt">excerpt</label>
                        <textarea class="form-control" id="update_excerpt" name="excerpt" rows="3"
                                  required>{{ $post->excerpt }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="update_body">Body</label>
                        <textarea class="form-control" id="update_body" name="body" rows="13"
                                  required>{{ $post->body }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_post">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- POSTMODAL END-->



</main>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>



    $(document).on('click', '.update_post', function (e) {
        e.preventDefault();
        //var post_id = $(this).val();
        //console.log(post_id);
        var postId = {{$post->id}};

        var data = {

            'title' : $('#update_title').val(),
            'body' : $('#update_body').val(),
            'excerpt' : $('#update_excerpt').val()
         };


        $.ajax({
            type:"PUT",
            url:"/update-post/"+postId,
            data: data,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {
                $('#exampleModal').modal('hide');
                $('.post-title').html(data.title);
                $('.post-body').html(data.body);
                $('.post-excerpt').html(data.excerpt);


            },
            error: function (error) {
                console.error('Error updating post:', error);
            }



        });
    });

    $(document).on('click', '.editPost', function (e) {
        $('#exampleModal').modal('show');
        e.preventDefault();

        var postId = {{$post->id}};



        $.ajax({
            type:"GET",
            url:"/edit-post/"+postId,

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {
            },
            error: function (error) {
                console.error('Error updating post:', error);
            }



        });
    });




</script>


</body>
<!-- Bootstrap JavaScript Bundle with Popper.js -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

<!-- Alpine.js
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-min.js" defer></script>
-->
</html>


<!--
<script src="{ mix('js/app.js') }}"></script>
-->
<!-- -->

<!-- NEWSLETTERS-->
<!--   <footer>
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
    -->


