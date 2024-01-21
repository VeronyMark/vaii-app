$(document).ready(function () {
    $('#createPostForm').submit(function (e) {
        e.preventDefault();

        let form = $(this);
        let formData = new FormData(form[0]);

        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                let post = data.post;

                $('.post-title').text(post.title);
                $('.post-excerpt span').html(post.excerpt);
                $('.post-body').html(post.body);

                window.location.href = '/posts';
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
    });

    function showError(text) {
        Swal.fire({
            icon: 'error',
            text: text,
            showConfirmButton: true,
            timer: 3000,
        });
    }

});

function selectCategory(selectedCategoryId, selectedCategoryName) {
    document.getElementById('selectedCategory').innerText = selectedCategoryName;
    document.getElementById('category_id').value = selectedCategoryId;
}

