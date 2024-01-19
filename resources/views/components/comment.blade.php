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


        <!--        <div class="d-flex">
            <form method="post" action="{ route('comments.edit', ['comment' => $comment]) }}" class="me-2" >
                csrf
                method('get')
                if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id() == $comment->user_id)
                    <button type="submit" class="editComments btn btn-sm btn-success">Zmeň</button>
                endif
            </form> -->
        @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id() == $comment->user_id)

            <div class="d-flex">

                <button type="button" class="editComments btn btn-sm btn-success me-2"
                        data-comment-id="{{ $comment->id }}">
                    Zmeň
                </button>





                <form method="post" action="{{ route('comments.delete', ['comment' => $comment]) }}" class="mt-4">

                    @csrf
                    @method('delete')

                    @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::id() == $comment->user_id)
                        <button type="submit" class="btn btn-sm btn-outline-danger">Zmaž Komentár</button>
                    @endif
                </form>
            </div>
        @endif

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
                    <label for="update_body">Body</label>
                    <textarea class="form-control" id="update_body" name="body" rows="13"
                              required>{{ $comment->body }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_comment">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- POSTMODAL END-->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>



    $(document).on('click', '.update_comment', function (e) {
        e.preventDefault();
        //var post_id = $(this).val();
        //console.log(post_id);
        var commentId = {{$comment->id}};

        var data = {

            'body' : $('#update_body').val(),
        };


        $.ajax({
            type:"PUT",
            url:"/update-comment/"+commentId,
            data: data,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {
                $('#exampleModal').modal('hide');

                $('.comment-body').html(data.body);


            },
            error: function (error) {
                console.error('Error updating post:', error);
            }



        });
    });

    $(document).on('click', '.editComments', function (e) {
        $('#exampleModal').modal('show');
        e.preventDefault();

        var commentId = {{$comment->id}};



        $.ajax({
            type:"GET",
            url:"/edit-comment/"+commentId,

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



