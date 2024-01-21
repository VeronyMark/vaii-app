<article class="d-flex bg-light  rounded p-4 mb-4">
    <div class="pl-4">
        <header class="mb-2">
            <h3 class="font-weight-bold">{{ $comment->author->username }} </h3>
            <p class="text-muted">
                <time>{{ $comment->updated_at->diffForHumans() }}</time>
            </p>
        </header>

        @if (strpos($comment->body, ' ') !== false)
            <p class = "d-flex">{{$comment->body}}</p>

        @else
            <p id="comment-body">{!! nl2br(e(wordwrap($comment->body, 30, "\n", true))) !!}</p>

        @endif
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.all.min.js"></script>

<script>


    $(document).on('click', '.deleteKoment', function (e) {
        e.preventDefault();
        var commentId = $(this).data('comment-id');
        var postId = {{$comment->post_id}};

        $.ajax({
            type: "GET",
            url: "/posts/" + postId + "/details",
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

                        showStyledAlert("/posts/" + postId, "KOMENTÁR JE ODSTRÁNENÝ");

                    },
                    error: function (error) {
                        console.error('Error deleting comment:', error);
                    }
                });
            },
            error: function (error) {
                console.error('Error fetching post details:', error);
            },
        });



    });

    function showStyledAlert(redirectUrl,text) {
        Swal.fire({
            icon: 'success',
            text: text,
            showConfirmButton: false,
            timer: 3000,
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer && redirectUrl) {
                window.location.href = redirectUrl;
            }
        });
    }

    function showError(text) {
        Swal.fire({
            icon: 'error',
            text: text,
            showConfirmButton: true,
        });
    }


    //NAJSKOR EDIT
    $(document).on('click', '.editComments', function (e) {
        e.preventDefault();

        var commentId = $(this).data('comment-id');

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
            url: "/posts/" + postId + "/details",
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

                        showStyledAlert("/posts/" + postId, "KOMENTÁR JE AKTUALIZOVANÝ");

                    },
                    error: function (error) {
                        if (error.responseJSON && error.responseJSON.message) {
                            showError(error.responseJSON.message);
                        } else {
                            console.error('Unexpected error structure:', error);
                            alert('Error creating post. Please try again.');
                        }


                    }
                });
            },
            error: function (error) {
                console.error('Error fetching post details:', error);
            }
        });
    });





</script>



