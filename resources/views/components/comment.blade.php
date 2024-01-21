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
                <time>{{ $comment->updated_at->diffForHumans() }}</time>
            </p>
        </header>
        <p>{{ $comment->body }}</p>

    </div>

</article>



<!-- Modal UPDATE MODAL-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AKTUALIZUJ SVOJ KOMENTÁR</h5>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="update_body">Text</label>
                    <textarea class="form-control" id="update_body" name="body" rows="3"
                              required>{{ $comment->body }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">ZRUŠ</button>
                <button type="button" class="btn btn-success update_comment" data-comment-id="{{ $comment->id }}">
                    AKTUALIZUJ
                </button>
            </div>


        </div>
    </div>
</div>
<!-- POSTMODAL END-->


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
    $(document).on('click', '.deleteKoment', function (e) {
        e.preventDefault();
        var commentId = $(this).data('comment-id');
        var postId = {{$comment->post_id}};

        $.ajax({
            type: "GET",
            url: "/posts/" + postId + "/details", // Adjust the route to fetch post details
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (postDetails) {
                $.ajax({
                    type: "DELETE",
                    url: "/comments/" + commentId,
                    data: {
                        id: commentId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log("Comment deleted successfully");
                        // Redirect to the post page using the fetched slug
                        window.location.href = "/posts/" + postDetails.slug;
                    },
                    error: function (error) {
                        console.error('Error deleting comment:', error);
                    }
                });
            },
            error: function (error) {
                console.error('Error fetching post details:', error);
            }
        });
    });

    //NAJSKOR EDIT
    $(document).on('click', '.editComments', function (e) {
        e.preventDefault();
        console.log('Edit button clicked'); // Check if this log appears in the console

        var commentId = $(this).data('comment-id'); //{$comment->id}};

        $('#exampleModal').modal('show');

        $.ajax({
            type: "GET",
            url: "/edit-comment/" + commentId,

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


    $(document).on('click', '.update_comment', function (e) {
        e.preventDefault();

        var commentId = $(this).data('comment-id');

        var data = {
            'body': $('#update_body').val(),
        };

        var postId = {{$comment->post_id}};

        $.ajax({
            type: "GET",
            url: "/posts/" + postId + "/details", // Adjust the route to fetch post details
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (postDetails) {

                $.ajax({
                    type: "PUT",
                    url: "/update-comment/" + commentId,
                    data: data,
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {

                        $('#exampleModal').modal('hide');

                        $('.comment-body').html(data.body);

                        window.location.href = "/posts/" + postDetails.slug;


                    },
                    error: function (error) {
                        console.error('Error updating post:', error);
                    }
                });
            },
            error: function (error) {
                console.error('Error fetching post details:', error);
            }
        });
    });

</script>



