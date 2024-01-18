<article class="d-flex bg-light  rounded p-4 mb-4">
   <!-- <div class="flex-shrink-0 mr-4">
        !--
        <img src="https://i.pravatar.cc/60?u={ $comment->user_id }}" alt="" width="60" height="60"
             class="rounded-circle">    ->
    </div>
-->
    <div class="pl-4">
        <header class="mb-2">
            <h3 class="font-weight-bold">{{ $comment->author->username }} </h3>
            <p class="text-muted">
                <time>{{ $comment->created_at }}</time>
            </p>
        </header>
        <p>{{ $comment->body }}</p>


        <div class="d-flex">
            <form method="post" action="{{ route('comments.edit', ['comment' => $comment]) }}" class="mt-4 me-2" >
                @csrf
                @method('get')
                @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id() == $comment->user_id)
                    <button type="submit" class="editComments btn btn-sm btn-success">Zmeň</button>
                @endif
            </form>
            <div id="app">
                <!-- Your existing HTML content here -->

                <form @submit.prevent="deleteComment(comment.id)">
                    @csrf
                    @method('delete')

                    <button type="submit" class="deleteComment btn btn-sm btn-outline-danger">Zmaž</button>
                </form>
            </div>

            <!--
            <form method="post" action="{ route('comments.delete', ['comment' => $comment]) }}" class="mt-4">
                csrf
                method('delete')

                if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id() == $comment->user_id)
                    <button type="submit" class="deleteComment btn btn-sm btn-outline-danger">Zmaž</button>
                endif
            </form>
            -->
        </div>


    </div>
</article>


