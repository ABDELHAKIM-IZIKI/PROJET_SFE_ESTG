@extends('Fonctionnaire.templateF')

@section('title')
Mon équipement :
@endsection


@section('content')

 <!--searchbar-->
 <div class="mx-auto py-6  ">
    <form method="get" action="{{route('Fonctionnaire.search')}}" class="">
        @csrf
        <div class="relative flex ">
            <div class="flex  ps-3 pointer-events-none">
            </div>

            <input type="text" name="valeur" class="w-full rounded-l-lg p-3 h-10   border-gray-600 bg-white-400 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500" placeholder="recherche " />
            
            <button type="submit" class="p-2.5 rounded-r-lg text-sm font-medium text-white   border border-blue-700  bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </button>
        </div>
    </form>
</div>


<!--successajoute-->
@if (session()->has('success'))
<div class=" mx-4 my-6 text-sm text-green-800 rounded-lg bg-green-100  p-3 items-center z-0">
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif

<!--Display items-->
<div class="justify-center  bg-gray-300 z-0 ">
    <div class="p-1.5  flex flex-wrap pr-0 z-0">

        @foreach($registres as $item)

            <div class="w-96  bg-white border border-gray-200  rounded-lg shadow   p-2 m-2 z-0 ">
                <a href="{{route('GestionnairesStock.display',['id'=>$item->id])}}">
                    <img class="p-8  object-contain w-64 h-64  rounded-t-lg" src="{{ asset($item->materiel->image) }}" alt="product image" />
                </a>
                <div class="px-5 pb-5 start-0 flex flex-col">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 ">{{$item->materiel->nom}}</h5>
                    <span class="text-m font-semibold tracking-tight text-gray-800"> Marque : {{$item->materiel->marque->nom}}
                    </span>
                    <span class="text-m font-semibold tracking-tight text-gray-800">Model : {{$item->materiel->model}} </span>
                    <span class="text-m font-semibold tracking-tight text-gray-800">Date d'affictation : {{$item->date}} </span>
                </div>
                
                <div class="mr-3 flex float-right items-center">
                   
                    <button id="openRemove-{{$item->id}}"  class="text-white font-medium rounded-lg text-sm h-9  p-1.5 m-1.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                        Affecté à reclamation 
                    </button>

                    <!--RemoveModal-->
                    <div id="Remove-{{$item->id}}" class="drop-shadow-2xl fixed inset-0 z-50 flex items-center justify-center hidden p-5  ">
                        <div class="flex flex-col modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50  overflow-y-auto p-10">
                            <form action="{{ route('Fonctionnaire.add',[ 'id' => $item->id ] ) }}" method="post">
                             @csrf
                                 <div class="flex flex-col mx-auto">
                                    <input type="number" value="{{$item->users_id}}" name="users_id" class="hidden">
                                    <input type="number" value="{{$item->id}}" name="registres_id" class="hidden">
                                    <input type="number" value="1" name="vue" class="hidden">
                                  <?php  
                                  $today = date("Y-m-d H:i:s") ;
                                    echo '<input type="hidden" value="'.$today.'" name="date" >' ; 
                                    ?>
                                    <div>
                                        <label class="font-medium text-black uppercase">Entrer votre reclamation :</label>
                                        <textarea id="description" class="w-full rounded-lg p-3 h-60 m-2 bg-gray-100 border-gray-600 placeholder-gray-700 text-gray-700" name="reclamation"></textarea>
                                        @error('reclamation')
                                        <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                 </div>
                           

                                


                               <div class="flex flex-col items-center">
                                <div class="text-m font-semibold tracking-tight text-gray-800 mb-10">
                                    Êtes-vous sûr de vouloir réclamer le materiel ?
                                   </div>
                                <div class="flex">
                                    <button type="submit" class="mr-20 text-white font-medium rounded-lg text-sm h-9 w-10  p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                        Oui</button>
                              
                                <button  id="closeRemove-{{$item->id}}" type="button" class="text-white font-medium rounded-lg  w-10 text-sm h-9 p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                    No </button>
                                </div>
                                </div>
                            </form>
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

@endsection