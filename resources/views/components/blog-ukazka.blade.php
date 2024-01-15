<!-- clanok 1-->
@props(['post'])

<div class="col-md-8">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm"
         style="height: 250px; background-image: url('{{ asset('storage/' . $post->image_path) }}');background-size: cover; position: relative;">
        <!--  <p>{ asset('storage/' . $post->image_path) }}</p>
        <img src="{ Storage::url('app/'.$post->image_path) }}" alt="obrastek">
        <img src="{ asset('storage/app/images/lojyYW3uyvtWImMcPIrKmNvTRTgucsS3Xe3KUvtI.jpg') }}" alt="obrastek">
        <img src="{ asset('storage/app/photos/1hXSKQOdHAbFFYEcXbkzjmEvgXqSXZc1zGkDoNHB.jpg') }}" alt="Image">
-->
        <?php
        // Assuming $post is the variable that contains your data
        $imageUrl = url('storage/app' . $post->image_path);
        ?>

        <img src="{{ $imageUrl }}" alt="Your Alt Text">


        <img src="{{ Storage::url($imageUrl)}}" alt="zas nic" />
        <img src="{{ Storage::url("storage/app/{ $post->image_path}") }}" alt="zas nic" />
        <img src="{{ Storage::url('public/images/2x1qRGpX4feD4xYaxIWaCuxfXlA6L5SWu5DNbLZl.png') }}" alt="obrastek">

        <!--style="height: 250px; background-image: url('{ asset('Images/modrotlac.jpg') }}'); background-size: cover; position: relative;"> -->
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
