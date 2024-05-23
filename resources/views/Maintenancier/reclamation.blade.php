@extends('Maintenancier.templateM')

@section('title')
Boîte de réception de reclamation :
@endsection

@section('content')



<!--success-->
@if (session()->has('success'))
<div class=" mx-4 my-6 text-sm text-green-800 rounded-lg bg-green-100  p-3 items-center z-0">
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif


<div class="px-4 ">
    <form method="get" action="{{route('Maintenancier.search')}}" class="">   

        <div class=" flex flex-wrap  lg:flex-inline justify-center items-center  ">
            

            <div class="flex   w-full lg:w-1/2 m-1.5">
                <input type="text" name="valeur" class=" rounded-lg p-3 h-10 w-full bg-white border-gray-600 placeholder-gray-700 text-gray-700" placeholder="recherche " />
            </div> 

            <button type="submit" class="w-full md:w-auto  p-2.5 m-1.5 text-sm font-medium text-white rounded-lg border border-blue-700 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                <svg class="w-5 h-4 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </button>
        </div>
    </form>
</div>


<!--table-->
<div class="mx-4 relative overflow-x-auto z-0">
    <br />
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-400 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Fonctionnaire
                </th>
                <th scope="col" class="px-6 py-3">
                    Division
                </th>
                <th scope="col" class="px-6 py-3">
                    Service
                </th>
                <th scope="col" class="px-6 py-3">
                    lieu
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom de materiel
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

@if (!$reclamation->isempty())
    

            @foreach ($reclamation as $item)

            @if ($item->vue == 1)
            <tr class="font-semibold bg-white ">
                @endif
                
                @if ($item->vue == 0)
                <tr class="bg-gray-200">
              @endif
        
           


                <td class="px-6 py-4 text-black">
                  {{ $item->registre->user->nom }}  {{ $item->registre->user->prenom }}
                </td>
                <td class="px-6 py-4 text-black">
                    {{ $item->registre->user->division}}
                </td>
                <td class="px-6 py-4 text-black">
                    {{ $item->registre->user->service}}
                </td>
               
                <td class="px-6 py-4 text-black">
                    {{ $item->registre->lieu}}
                </td>
                <td class="px-6 py-4 text-black">
                    {{ $item->registre->materiel->nom}}
                </td>
                <td class="px-6 py-4 text-right flex">
                    
                    
                    
                    <button id="openupdate-{{$item->id}}" class="font-medium text-blue-500 hover:underline p-1 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M458-280q18 0 35.5-4.5T526-298l98 98 56-56-98-98q9-15 13.5-32.5T600-422q0-58-41-98t-99-40q-58 0-99 41t-41 99q0 58 40 99t98 41Zm2-80q-25 0-42.5-17.5T400-420q0-25 17.5-42.5T460-480q25 0 42.5 17.5T520-420q0 25-17.5 42.5T460-360ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z"/></svg>
                     </button>
                 
                     <div id="update-{{$item->id}}" class="text-left drop-shadow-2xl fixed inset-0 z-50 flex items-center justify-center hidden p-10 ">
                        <div class="flex flex-col modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 ">
                           
                            <form action="{{ route('Maintenancier.vue') }}" method="post">
                                @csrf 
                            <div class="m-4 flex justify-end">

                                <input type="number" value="{{$item->id}}" name="id" class="hidden">
                                <input type="number" value="0" name="vue" class="hidden">
                                <button type="submit" id="closeupdate-{{$item->id}}" class="p-1.5 hover:bg-gray-200 rounded-lg">X</button>
                            </div>
                            </form>

                            <div class="flex flex-col mx-5 mb-5">
                                <div class="flex my-2">
                                <label class="font-medium text-black uppercase ">Fonctionnaire : </label><span class="font-normale text-black text-xxl">&ensp;{{ $item->registre->user->nom }}  {{ $item->registre->user->prenom }} </span>
                                </div>
                                <div class="flex my-2">
                                    <label class="font-medium text-black uppercase ">Division :</label><span class="font-normale text-black text-xxl">&ensp;{{ $item->registre->user->division}}</span>
                                    </div>
                                    <div class="flex my-2">
                                        <label class="font-medium text-black uppercase ">Service :</label><span class="font-normale text-black text-xxl">&ensp;{{ $item->registre->user->service}}</span>
                                        </div>
                                        <div class="flex my-2">
                                            <label class="font-medium text-black uppercase ">Nom de materiel :</label><span class="font-normale text-black text-xxl">&ensp;{{$item->registre->materiel->nom}}</span>
                                            </div>
                                            <div class="flex my-2">
                                                <label class="font-medium text-black uppercase ">Model de materiel :</label><span class="font-normale text-black text-xxl">&ensp;{{$item->registre->materiel->model}}</span>
                                                </div>
                                                <div class="flex my-2">
                                                    <label class="font-medium text-black uppercase ">Date de Réclamation :</label><span class="font-normale text-black text-xxl">&ensp;{{ $item->date}}</span>
                                                    </div>
                                
                                <label class="font-medium text-black uppercase my-2">Réclamation :</label>
                                <textarea class="font-normal rounded-lg h-60   z-60  bg-gray-100 border-gray-600  text-gray-700  p-2 " readonly>@php echo $item->reclamation @endphp </textarea>
                            </div>
                        </div>
                    </div>


                
                    <button id="openremove-{{$item->id}}" class="font-medium text-blue-500 hover:underline p-1 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                    </button>
                
                
                    <div id="remove-{{$item->id}}" class="text-left drop-shadow-2xl fixed inset-0 z-50 flex items-center justify-center hidden p-10 ">
                        <div class="flex flex-col modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 ">
                           
                            <form action="{{ route('Maintenancier.remove') }}" method="post">
                                @csrf 
                                @method('DELETE')
                            <div class="m-5 flex flex-col justify-end ">

                                <input type="number" value="{{$item->id}}" name="reclamastion_id" class="hidden">
                                <input type="number" value="{{$item->registre->id}}" name="registre_id" class="hidden">


                             <div>
                                
                                <div>
                                    <label class="font-medium text-black uppercase">Etat de matériel :<span  class="text-red-600">*</span></label>
                                    <select name="etat" class="w-full rounded-lg p-2 h-10 bg-gray-200 border-black  text-black" required>
                                        <option value="" selected></option>
                                        @foreach ($etats as $etat)
                                        <option value="{{$etat->id}}">{{$etat->nom}}</option>
                                        @endforeach
                                    </select>
                                    @error('etat')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="mb-5 mr-2">
                                    <label  class="block mb-2 text-sm font-medium text-black">Rapport :</label>
                                    <textarea class="w-full rounded-lg p-3 h-40 m-2 bg-gray-200 border-black  text-black" name="rapport"></textarea>
                                    @error('rapport')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                             
                                
                            </div>
                            
                               <div class="text-m font-semibold tracking-tight text-gray-800 mb-10 mx-auto">
                                    Êtes-vous sûr de vouloir supprimer la reclamation ?
                                </div>
                                <div class="flex mx-auto">
                                        <button type="submit" class="mr-10 text-white font-medium rounded-lg text-sm h-9 w-10  p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                            Oui</button>


                                    <button id="closeremove-{{$item->id}}" type="button"  class="text-white font-medium rounded-lg  w-10 text-sm h-9 p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                        No </button>

                                </div>
                           

                            </form>

                            
                        </div>
                    </div>
                
                
                
                </td>


            </tr>

           

            <script>
                var modal{{$item->id}} = document.getElementById("update-{{$item->id}}");
                var btn{{$item->id}} = document.getElementById("openupdate-{{$item->id}}");
                var span{{$item->id}} = document.getElementById("closeupdate-{{$item->id}}");

                 btn{{$item->id}}.onclick = function() {
                 modal{{$item->id}}.classList.remove("hidden");
                 }

                  span{{$item->id}}.onclick = function() {
                  modal{{$item->id}}.classList.add("hidden");
                 }

                 var modala{{$item->id}} = document.getElementById("remove-{{$item->id}}");
                var btna{{$item->id}} = document.getElementById("openremove-{{$item->id}}");
                var spana{{$item->id}} = document.getElementById("closeremove-{{$item->id}}");

                 btna{{$item->id}}.onclick = function() {
                 modala{{$item->id}}.classList.remove("hidden");
                 }

                  spana{{$item->id}}.onclick = function() {
                  modala{{$item->id}}.classList.add("hidden");
                 }
         </script>

            @endforeach
            @endif


        </tbody>
    </table>

@if ($reclamation->isempty())  

</div>
<div class="bg-gray-100 border-gray-600  mx-4  p-6 grid place-items-center">

 
    <span class="px-6 py-4 text-black text-3xl ">
    Aucune réclamation
    <span class="px-6 py-4 text-black">
 

</div>
@endif
@endsection