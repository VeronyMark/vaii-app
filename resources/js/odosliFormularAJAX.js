$(document).ready(function () {
    // Event handler for form submission using AJAX
    $('#createPostForm').submit(function (e) {
        e.preventDefault(); // Prevent default form submission

        var form = $(this);
        var formData = new FormData(form[0]); // Create FormData object for file upload

        // Append CSRF token to the form data
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
              //  console.log('Form submitted successfully:', data);

                // Assuming your post content is present in the 'data.post' attribute
                var post = data.post;

                // Update your UI to display the created post
                $('.post-title').text(post.title);
                $('.post-excerpt span').html(post.excerpt);
                $('.post-body').html(post.body);
                window.location.href = '/posts/' + post.slug;
            },
            error: function (error) {
                // Handle error
                console.error('Error submitting form:', error);
            }
        });
    });
});
