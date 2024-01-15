
<x-layout>

    <main class="container">
        <div class="row ">
            <!-- Ľavý panel -->
            <div class="col-md-4">
                <div class="position-sticky" style="top:2rem;">
                    <div class="p-4 mb-3 bg-light rounded-top">
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
                    <div class="p-4">
                        <h4>Archív</h4>
                        <ol class="list-unstyled mb-0">

                            <!--foreach ($categories as $category)
                                <li><a href="#"> { $category->name }}</a></li>
                                 <!-<a class="dropdown-item" href="#" onclick="selectCategory('{ $category->id }}', '{ $category->name }}')">
                                    { $category->name }}
                                </a>--
                            endforeach -->

                            <li><a href="#">Hrnčiarstvo</a></li>
                            <li><a href="#">Modrotlač</a></li>
                            <li><a href="#">Umelecké šperkárstvo</a></li>
                            <li><a href="#">Včelárstvo</a></li>
                            <li><a href="#">Výstavné rezbárstvo</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Pravý panel s článkami -->
            <div class="col-md-8" style="margin-top: 100px;">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">UVEREJNENÉ BLOGY </h3>
                @if ($posts->count()>1)
                    <div> <!--c lass="row mb-4"> -->
                        @foreach($posts as $postik)
                            <x-blog-ukazka :post="$postik"/>
                        @endforeach
                    </div>
                @else
                    <p class="text-center">Zatiaľ nebol pridaný žiaden post</p>
                @endif
            </div>
        </div>


    </main>


</x-layout>
