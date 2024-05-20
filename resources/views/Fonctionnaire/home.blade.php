@extends('Fonctionnaire.templateF')

@section('title')
Mon équipement :
@endsection


@section('content')

<!--Display items-->
<div class="justify-center  bg-gray-300 z-0 ">
    <div class="p-1.5  flex flex-wrap pr-0 z-0">

        @foreach($registres as $item)

            <div class="w-96  bg-white border border-gray-200  rounded-lg shadow   p-2 m-2 z-0 ">
                <a href="{{route('GestionnairesStock.display',['id'=>$item->id])}}">
                    <img class="p-8  object-contain w-64 h-64  rounded-t-lg" src="{{ asset($item->image) }}" alt="product image" />
                </a>
                <div class="px-5 pb-5 start-0 flex flex-col">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 ">{{$item->materiel->nom}}</h5>
                    <span class="text-m font-semibold tracking-tight text-gray-800"> Marque : {{$item->materiel->marque->nom}}
                    </span>
                    <span class="text-m font-semibold tracking-tight text-gray-800">Model : {{$item->materiel->model}} </span>
                    <span class="text-m font-semibold tracking-tight text-gray-800">Date : {{$item->date}} </span>
                </div>
                
                <div class="mr-3 flex float-right items-center">
                   
                    <button id="openRemove-{{$item->id}}"  class="text-white font-medium rounded-lg text-sm h-9  p-1.5 m-1.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                        Affecté à reclamation 
                    </button>

                    <!--RemoveModal-->
                    <div id="Remove-{{$item->id}}" class="drop-shadow-2xl fixed inset-0 z-50 flex items-center justify-center hidden p-5  ">
                        <div class="flex flex-col modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50  overflow-y-auto p-10">
                            <form action="{{ route('gestionnairestock.destroy',[ 'id' => $item->id ] ) }}" method="post">
                           
                                 <div>
                                    <input type="number" value="{{$item->id}}" name="registres_id" class="hidden">
                                    <input type="number" value="0" name="vue" class="hidden">
                                    <input type="date" value="" name="date" class="hidden">
                                    <div>
                                        <label class="font-medium text-black uppercase">Entrer votre reclamation :</label>
                                        <input type="text" class="w-full rounded-lg p-3 h-10 bg-white border-gray-600 placeholder-gray-700 text-gray-700" name="reclamation"/>
                                        @error('reclamation')
                                        <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                 </div>
                           
                           
                           
                               
                              
                              
                                <div class="text-m font-semibold tracking-tight text-gray-800 mb-10">
                                Êtes-vous sûr de vouloir réclamer le materiel ?
                               </div>
                               <div class="flex mx-auto">
                                    <button type="submit" class="mr-10 text-white font-medium rounded-lg text-sm h-9 w-10  p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                        Oui</button>
                              
                                <button id="closeRemove-{{$item->id}}" type="submit" class="text-white font-medium rounded-lg  w-10 text-sm h-9 p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                    No </button>
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