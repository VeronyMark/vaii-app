<x-layout>
<main class="container mt-6 ">


    <article>

        <h2> {{$post->title}}</h2>

        <p style="color:grey ">{{$post->created_at->diffForHumans()}} <strong>{{$post->author->name}}</strong> </p>

        <p style="color:grey "><a href="/categories/{{$post->category->slug}}">{{$post->category->name}} </a></p>

        <!-- <p> <a href="/"></a> Spať na hlavnú stránku</p> -->
        <form method="post" action="{{ route('delete', ['post' => $post]) }}" class="mt-4">
            @csrf
            @method('delete')

            @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id() == $post->user_id)
                <button type="submit" class="deleteComment btn btn-sm btn-outline-danger">Zmaž</button>
            @endif
        </form>

        <p><strong>
                {{$post->excerpt}}
            </strong></p>

        <hr>

        <p>
            {{$post->body}}
        </p>

        <a class="btn btn-light hover:bg-blue-500" href="{{ route('post.edit', $post->id) }}">EDIT</a>

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
                    <textarea name="body" class="form-control" rows="4"  placeholder="Napíš nám svoj názor"></textarea>
                </div>

                <div class="justify-end mt-3 border-t ">
                    @auth
                        @csrf
                    <button type="submit" class="btn btn-dark">ZDIEĽAJ</button>
                    @endauth
                </div>
            </form>



            <div id="app">
                <comment-component :post="{{ $post }}"></comment-component>
            </div>






            <!--extra-->

        </section>

    </article>


</main>
    <!-- -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- -->

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


</x-layout>
