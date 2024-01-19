<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laravel Vue.js Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <!--  vite('resources/js/app.js') -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- <script type="module" src="{ mix('js/index.js') }}" defer></script>
 -->
</head>
<body>
<div>
    <p>SKUUUUUUUUdaUSA</p>
</div>
<div id="app">
    <my-component></my-component>
</div>
<div>
    <p>SKUSKAda</p>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">

                </div>
                <div class="user__info p-3">
                    <small class="error text-danger mb-2 d-block"></small>
                </div>
                <button class="btn btn-primary" data-id="{{ auth()->id() }}" onclick="fetchData(this)">
                    Fetch My Data
                </button>
            </div>
        </div>
    </div>
</div>

<div class="user__info p-3">
    <small class="error text-danger mb-2 d-block"></small>
</div>

</body>
</html>


<script>
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    function fetchData(e){
        let id = e.dataset.id
        $.ajax({
            type:'POST',
            url:"{{ route('data') }}",
            data:{
                id,
            },
            success:function(data){
                $('.user__info').html(data)
            },
            error:function(err){
                const error = JSON.parse(err.responseText).message
                console.log(error)
                $('.error').html(error)
            }
        })
    }
</script>
