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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
 <!--   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
-->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('Images/modrotlac.jpg') }}" type="image/jpeg">

   <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>

    <!-- Alpine.js
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-min.js" defer></script>-->


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


 <!--   <script src="{ asset('js/odosliFormularAJAX.js') }}"></script> -->



</head>
<body>

<div id="postHead"> <x-vrch/>
</div>

<main class="container mt-6">
    @include('flash-message')

    <button class="btn btn-dark btn-lg mx-auto d-block mt-4 mb-5"
            onclick="window.location.href='{{ route("welcome") }}'">ZOBRAZ VŠETKY BLOGY
    </button>

    <article>
        <div class="container h-100 mt-5">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">
                    <h3>PRIDAJ ČLÁNOK</h3>

                 <!--   <form id="createPostForm" method="POST" action="{ route('store') }}"-->

                    <form  id="createPostForm" method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-4">

                            <label for="title">NÁDPIS</label>
                            <input type="text" class="form-control" id="title"
                                   name="title" required>

                         <!--   <span style="color: red">error('title'){ $message }} enderror </span>
-->
                        </div>


                        <div class="form-group mt-4">
                            <label for="category_id" name="category_id">KATEGÓRIA</label>
                            <!-- Change the input type to text to show the selected category -->
                            <input type="text" class="form-control" id="selected_category_id" name="category_id"
                                   readonly required>
                            <div class="btn-group dropright">
                                <button type="button" class="btn btn-secondary dropdown-toggle mt-2"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span id="selectedCategory">Vyber kategóriu</span>
                                </button>

                                <div class="dropdown-menu">


                                    @foreach ($categories as $category)
                                        <a class="dropdown-item" href="#"
                                           onclick="selectCategory('{{ $category->id }}', '{{ $category->name }}')">
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                        </div>


                        <div class="form-group mt-4">
                            <label for="excerpt">UKÁŽKA</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="7" required></textarea>
                        </div>


                        <div class="form-group mt-4">
                            <label for="body">ČLÁNOK</label>
                            <textarea class="form-control" id="body" name="body" rows="40" required></textarea>
                        </div>

                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">

                        <div class="form-group mt-16 mb-4">
                            <label for="image">OBRÁZKOVÁ PRÍLOHA</label>
                            <input type="file" id="image" name="image" class="form-control"/> <!--accept="image/*" /> -->

                        </div>


                        <button type="submit" class="btn btn-dark btn-lg mx-auto d-block mt-4 mb-5">PRIDAJ ČLÁNOK</button>
                    </form>
                </div>
            </div>
        </div>
    </article>


</main>

<div id="postContent" class="mt-6" style="display: none;"></div>




</body>

<script>

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
                    var post = data.post;

                    $('.post-title').text(post.title);
                    $('.post-excerpt span').html(post.excerpt);
                    $('.post-body').html(post.body);

                    // Additional UI update or redirection if needed
                    //                    window.location.href = '/posts/' + post.slug;

                    window.location.href = '/posts';
                },
                error: function (error) {
                    // Handle error
                    console.error('Error submitting form:', error);
                }
            });
        });
    });
</script>
<!--VYBER KATEGORIE -->
<script>
    function selectCategory(selectedCategoryId, selectedCategoryName) {
        document.getElementById('selectedCategory').innerText = selectedCategoryName;
        document.getElementById('selected_category_id').value = selectedCategoryId;
    }

</script>

</html>
