<x-layout>

    <form method="post" action="{{ route('comments.update', ['comment' => $comment]) }}" class="mt-4">
        @csrf
        @method('put')

        <article class="d-flex bg-light border rounded p-4 mb-4">
            <div class="flex-shrink-0 mr-4">
                <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="" width="60" height="60"
                     class="rounded-circle">
            </div>

            <div class="pl-4">
                <header class="mb-2">
                    <h3 class="font-weight-bold">{{ $comment->author->username }} </h3>
                    <p class="text-muted">
                        <time>{{ $comment->created_at }}</time>
                    </p>
                </header>

                <div class="mt-3">
                    <textarea name="body" class="form-control" placeholder="Napíš nám svoj názor"></textarea>
                </div>



                <div>
                    <button type="submit" class="editComments btn btn-sm btn-success">ULOŽ ZMENY</button>
                </div>

            </div>
        </article>


    </form>


</x-layout>
