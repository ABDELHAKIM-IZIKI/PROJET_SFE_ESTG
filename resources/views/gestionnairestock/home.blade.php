@extends('gestionnairestock.templateGS')

@section('title')
Matériels et
d’équipement :
@endsection


@section('content')


<!--searchbar-->

    <div class="px-4 ">
        <form method="get" action="{{route('gestionnairestock.search')}}" class="">   
            @csrf
            <div class=" flex flex-wrap  lg:flex-inline justify-center items-center  ">
                

                <div class="flex   w-full lg:w-1/2 m-1.5">
                    <input type="search" name="valeur" class=" rounded-l-lg p-3 h-10 w-full bg-white border-gray-600 placeholder-gray-700 text-gray-700" placeholder="recherche par nom/model/barcode" />
                    <button id="BARCODE" class="p-1.5 h-10 w-10 rounded-r-lg border border-blue-700 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                            <path d="M40-120v-200h80v120h120v80H40Zm680 0v-80h120v-120h80v200H720ZM160-240v-480h80v480h-80Zm120 0v-480h40v480h-40Zm120 0v-480h80v480h-80Zm120 0v-480h120v480H520Zm160 0v-480h40v480h-40Zm80 0v-480h40v480h-40ZM40-640v-200h200v80H120v120H40Zm800 0v-120H720v-80h200v200h-80Z"/>
                        </svg>
                    </button>
                </div> 
                
                <select name="categories_id" class="rounded-lg p-2 m-1.5 h-10 w-full md:w-40  bg-white border-gray-600 placeholder-gray-700 text-gray-700">
                    <option selected>Choisir une categorie</option>
                    <option value="">Avec no catégorie</option>
                    @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->nom}}</option>
                    @endforeach
                </select>

                <select name="marques_id" class=" rounded-lg p-2 m-1.5 h-10 w-full md:w-40  bg-white border-gray-600 placeholder-gray-700 text-gray-700">
                    <option selected>Choisir une marque</option>
                    <option value="">Avec no marque</option>
                    @foreach ($marques as $item)
                    <option value="{{$item->id}}">{{$item->nom}}</option>
                    @endforeach
                </select>

                    

                <button type="submit" class="w-full md:w-auto  p-2.5 m-1.5 text-sm font-medium text-white rounded-lg border border-blue-700 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                    <svg class="w-5 h-4 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>

<br/>





<!--ajouterbottun-->
<div class="flex flex-row-reverse z-0 ">
    <a href="{{route('gestionnairestock.fill')}}" class=" mr-4 rounded-lg  h-10 px-4 py-2 w-25 mx-2 bg-blue-600 hover:bg-blue-700  text-white text-sm">Ajouter un nouveau Matériels ou équipement 
    </a>
</div>
<br/>

 <!--successajoute-->
 @if (session()->has('success'))
 <div class=" mx-4 my-6 text-sm text-green-800 rounded-lg bg-green-100  p-3 items-center z-0">
     <span class="font-medium">{{ session('success') }}</span>
 </div>
 @endif


<!--Display items-->
<div class="justify-center  bg-gray-300 ">
    <div class="p-1.5  flex flex-wrap pr-0 ">

        @foreach($materiels as $item)

            <div class="w-96  bg-white    rounded-lg shadow   p-2 m-2  hover:border-black border-2  border-solid">
                <a href="{{route('GestionnairesStock.display',['id'=>$item->id])}}">
                    <img class="p-8  object-contain w-64 h-64  rounded-t-lg" src="{{ asset($item->image) }}" alt="product image" />
                </a>
                <div class="px-5 pb-5 start-0 flex flex-col">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 ">{{$item->nom}}</h5>
                    <span class="text-m font-semibold tracking-tight text-gray-800"> Marque :
                        <?php
                        foreach ($marques as $marque) {
                            if ($item->marques_id == $marque->id) {
                                echo " {$marque->nom} " ;
                            }
                        }
                        ?>
                    </span>
                    <span class="text-m font-semibold tracking-tight text-gray-800">Model : {{$item->model}} </span>
                    <span class="text-m font-semibold tracking-tight text-gray-800">Date : {{$item->date}} </span>
                    <div class="flex flex-col content-right">
                        <span class="m-2 bg-blue-100 text-blue-800 text-m font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 float-end">
                            Quantité total : {{ $item->quantite }}
                        </span>
                    
                      
                        @php
    $quantiteDisponible = $item->quantite;
    $etat = true;
@endphp

@foreach ($dispoTab as $item2)
    @if ($item2->materiels_id == $item->id)
        @php
            $quantiteDisponible = $item->quantite - $item2->a;
        @endphp

        @if ($quantiteDisponible > 0)
            <span class="mx-2 bg-blue-200 text-blue-800 text-m font-semibold px-2.5 py-0.5 rounded float-end">
                Quantité Disponible : {{ $quantiteDisponible }}
            </span>
            @php
                $etat = false;
            @endphp
        @endif

        @if ($quantiteDisponible <= 0)
            <span class="mx-2 text-white px-2.5 py-0.5 bg-red-500 rounded float-end">
                Indisponible
            </span>
            @php
                $etat = false;
            @endphp
        @endif
    @endif
@endforeach

@if ($etat)
    <span class="mx-2 bg-blue-200 text-blue-800 text-m font-semibold px-2.5 py-0.5 rounded float-end">
        Quantité Disponible : {{ $item->quantite }}
     
    </span>
@endif

                    </div>
                    
                    

                    
                </div>
                <div class="mr-3 flex float-right items-center">
                   @if (!$quantiteDisponible <= 0)
                    <a href="{{route('Registre.filleAffectation',['id' => $item->id])}}" class="text-white font-medium rounded-lg text-sm h-9  p-1.5 m-1.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                        Affecté à fonctionnaire
                    </a>
                    @endif
                    <a href="{{route('gestionnairestock.filledit',['id' => $item->id])}}" class="text-white font-medium rounded-lg text-sm h-9  p-1.5 m-1.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                    </a>
                    <button id="openRemove-{{$item->id}}"  class="text-white font-medium rounded-lg text-sm h-9  p-1.5 m-1.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                    </button>
                    <!--RemoveModal-->
                    <div id="Remove-{{$item->id}}" class="drop-shadow-2xl fixed inset-0 z-50 flex items-center justify-center hidden p-5  ">
                        <div class="flex flex-col modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50  overflow-y-auto p-10">
                            <div class="text-m font-semibold tracking-tight text-gray-800 mb-10">
                                Êtes-vous sûr de vouloir supprimer le  materiel ?
                            </div>
                            <div class="flex mx-auto">
                                <form action="{{ route('gestionnairestock.destroy',[ 'id' => $item->id ] ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mr-10 text-white font-medium rounded-lg text-sm h-9 w-10  p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                        Oui</button>
                                </form>
                                <button id="closeRemove-{{$item->id}}"  class="text-white font-medium rounded-lg  w-10 text-sm h-9 p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                    No </button>
                            </div>
                        </div>
                    </div>
                    <script>
                        var modal{{$item->id}} = document.getElementById("Remove-{{$item->id}}");
                        var btn{{$item->id}} = document.getElementById("openRemove-{{$item->id}}");
                        var span{{$item->id}} = document.getElementById("closeRemove-{{$item->id}}");

                        btn{{$item->id}}.onclick = function() {
                            modal{{$item->id}}.classList.remove("hidden");
                        }

                        span{{$item->id}}.onclick = function() {
                            modal{{$item->id}}.classList.add("hidden");
                        }

                    </script>
                  
                </div>
            </div>
        @endforeach

    </div>
</div>

<!--pagination-->
<div class="m-4">

    {{ $materiels->links() }}
    
    </div>

 


    






</div>


@endsection

