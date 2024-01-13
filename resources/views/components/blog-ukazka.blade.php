<!-- clanok 1-->
@props(['post'])

<div class="col-md-8">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm"
         style="height: 250px; background-image: url('{{ asset('Images/modrotlac.jpg') }}'); background-size: cover; position: relative;">
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
