<!-- clanok 1-->
@props(['post'])

<div class="col-md-8">
    <!--background-image: url('{ asset('storage/' . $post->image_path) }}') --->
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm"
         style="height: 250px;  background-image: url('{{asset('images/'.$post->image)  }}')
         ;background-size: cover; position: relative;"
    >
       <!--
        <img src="{{ asset('images/1705272226.png') }}">
        <img src="{{ asset('images/'.$post->image)}}">



            <img src="{{ asset('storage/imges/1BsZYecFBvS3Ni8ehxUhC3C0F8TLi0gENoEFyABu.jpg' ) }}" alt="{{ $post->title }}">
            <img url="{{ asset('storage/app/public/post/17D19lRvwJB8vcLkQBoiyybpX50uIXPXsJUlbWu5.jpg' ) }}" alt="ni">

            <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}">

        <img src="{{ asset('storage/'.$post->image) }}" alt="postik">
-->


        <div class="col-md-6 d-flex flex-column  position-static p-4"
             style="background: rgba(255, 255, 255, 0.85);">
            <p style="color:grey ">
                <a href="/categories/{{$post->category->slug}}"></a><strong class=" mb-2 text-success" style="font-size: 14px;">{{$post->category->name}} </strong></p>


            <h3 class="fw-bold" style="font-size: 18px;">{{$post->title}}</h3>
            <p style="font-size: 16px;">  {{$post->excerpt}}
            </p>
            <a href="/posts/{{$post->slug}}">Pokračuj v čítaní</a>
        </div>
    </div>
</div>
