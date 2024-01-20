<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <title>TRM-blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Bootstrap JavaScript, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Your additional styles and scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/odosliFormular.js') }}"></script>


    <script>
        function selectCategory(selectedCategoryId, selectedCategoryName) {
            // console.log('Selected Category ID:', selectedCategoryId);
            // console.log('Selected Category Name:', selectedCategoryName);

            document.getElementById('selectedCategory').innerText = selectedCategoryName;
            document.getElementById('selected_category_id').value = selectedCategoryId;
        }
    </script>


</head>


<body>

<div class="container">
    <header class="blog-header py-5">
        <div id="headerSubPages" class="row">
            <div class="col-4"></div>

            <div class="col-4 text-center">
                <img src="{{ asset('Images/logo/default-monochrome.svg') }}" alt="Logo" class="img-fluid">
            </div>

            <div class="col-4 d-flex justify-content-center">
                <nav class="navbar navbar-expand-lg">
                    @guest
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a href="/" class="btn btn-dark">Domov</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-black" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-label">
                                    <i class="bi bi-person-circle"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-label">
                                    <li><a class="dropdown-item" href="/login">Prihlásenie</a></li>
                                    <li><a class="dropdown-item" href="/register">Registrácia</a></li>
                                </ul>
                            </li>
                        </ul>
                    @else
                        <span class="text-center fw-bold text-uppercase ms-3 me-2" style="color: #757575;">Vitaj, {{auth()->user()->name}}!</span>
                        <form method="POST" action="/logout" class="fw-bold">
                            @csrf
                            <button type="submit" class="btn btn-danger">Odlásenie</button>
                        </form>
                    @endguest
                </nav>
            </div>
        </div>
    </header>
</div>

<main class="container mt-6">
    @include('flash-message')

    <article>
        <div class="container h-100 mt-5">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">
                    <h3><strong>PRIDAJ ČLÁNOK</strong></h3>


                    <form  id="createPostForm" method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-4 row">
                            <div class="col-md-6">

                                <label for="title">NÁDPIS</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                       name="title" required>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-md-6">
                                <label for="category_id" name="category_id">KATEGÓRIA</label>
                                <!-- Change the input type to text to show the selected category -->
                                <input type="text" class="form-control" id="selected_category_id" name="category_id"
                                       readonly required>
                                <div class="btn-group dropright">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
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
                        </div>


                        <div class="form-group mt-4">
                            <label for="excerpt">UKÁŽKA</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="4" required></textarea>
                        </div>


                        <div class="form-group mt-4">
                            <label for="body">ČLÁNOK</label>
                            <textarea class="form-control" id="body" name="body" rows="40" required></textarea>
                        </div>

                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">

                        <div class="form-group mt-4">
                            <label for="image">Obrázok</label>
                            <input type="file" name="image" class="form-control"/> <!--accept="image/*" /> -->

                        </div>

                        <button type="submit" class="btn btn-primary">PRIDAJ ČLÁNOK</button>
                    </form>
                </div>
            </div>
        </div>
    </article>
</main>
<div id="postContent" class="mt-6" style="display: none;"></div>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle form submission using AJAX
        $('#createPostForm').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Create a FormData object to handle file uploads
            var formData = new FormData(this);

            // Make the AJAX request
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Hide the form
                    $('#createPostForm').hide();

                    // Display the post content
                    $('#postContent').html(response.post).show();
                },
                error: function (error) {
                    console.error('Error creating post:', error);
                    // Handle errors as needed
                }
            });
        });
    });
</script>
</html>
