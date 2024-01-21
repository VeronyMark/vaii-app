<x-layout>

    <main class="container">
        @if(session()->has('statusPostOk'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session()->get('statusPostOk') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session()->has('statusDeleteOk'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session()->get('statusDeleteOk') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row ">

            <!-- ĽAVÁ CAST FIXNY PANEL INFO O NAS, KATEGORIE  -->
            <div class="col-md-4">
                <div class="position-sticky">

                    <!--  KATEGORIE UKAZKA   -->
                    <div class="p-4">
                        <h4>Archív</h4>
                        <ol class="list-unstyled mb-0">

                            @foreach ($categories as $category)
                                <li> <a href="/categories/{{$category->slug}}" style="color: #2d3748">
                                        {{ $category->name }} </a>
                                </li>
                            @endforeach
                        </ol>

                    </div>

                    <button class="btn btn-dark btn-lg mx-auto d-block mt-4 mb-5"
                            onclick="window.location.href='{{ route("welcome") }}'">ZOBRAZ VŠETKY BLOGY
                    </button>
                    <!--TEXT O NAS -->
                    <div class="p-4 mb-3 mt-4 bg-light rounded-top">
                        <h4>O nás</h4>
                        <p class="mb-0"> Vitajte na našom blogu, kde objavujeme fascinujúci svet remesiel, inšpirácie z
                            minulosti a užitočné triky pre všetkých remeselníkov. Ak ste zvedaví na tradičné zručnosti,
                            ktoré prežili stáročia a tvoria našu kultúrnu dedičinu, tak ste na správnom mieste. Naše
                            blogy
                            vám poskytnú zaujímavý pohľad na rôzne remeselné techniky a prinesú vám inšpiráciu, aby ste
                            aj
                            vy mohli objaviť svoju kreativitu. Nielenže sa zameriame na zručnosti a tipy pre
                            začiatočníkov,
                            ale tiež sa pohráme s históriou, aby sme vám priblížili, ako sa remeslá vyvíjali v priebehu
                            času. Spolu objavíme krásu tradičných remesiel a vytvoríme prepojenie medzi minulosťou a
                            súčasnosťou. Poďte s nami na cestu do sveta remeselníkov a ich dovedností.</p>
                    </div>



                </div>
            </div>

            <!-- PRAVA CAST UKAZKY CLANKOV -->
            <div class="col-md-8" style="margin-top: 20px;">
                <h3 class="pb-4 mb-4  border-bottom">UVEREJNENÉ BLOGY </h3>
                @if ($posts->count()>0)        <!-- >=1 -->
                    <div>
                        @foreach($posts as $postUkazka)
                            <x-blog-ukazka :post="$postUkazka"/>
                        @endforeach
                    </div>
                @else
                    <p class="text-center">Zatiaľ nebol pridaný žiaden post</p>
                @endif
            </div>

            <div class="pagination justify-content-center  ">
                {{$posts->links()}}
            </div>
        </div>
    </main>

</x-layout>






