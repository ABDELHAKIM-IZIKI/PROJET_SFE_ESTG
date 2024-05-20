@extends('Fonctionnaire.templateF')

@section('title')
Mon réclamation :
@endsection

@section('content')



<!--successajoute-->
@if (session()->has('success'))
<div class=" mx-4 my-6 text-sm text-green-800 rounded-lg bg-green-100  p-3 items-center z-0">
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif

<div class="mx-4 relative overflow-x-auto sm:rounded-lg z-0">
    <br />
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-400 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom de materiel
                </th>
                <th scope="col" class="px-6 py-3">
                   Model de materiel
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reclamation as $item)
          
            <tr class="bg-gray-100 border-gray-600 hover:bg-gray-200">


                <td class="px-6 py-4 text-black">
                  {{ $item->registre->materiel->nom}}
                </td>
                <td class="px-6 py-4 text-black">
                    {{ $item->registre->materiel->model}}
                </td>
                <td class="px-6 py-4 text-black">
                    {{ $item->date}}
                </td>
                <td class="px-6 py-4 text-right flex">
                    
                    
                    <button id="openupdate-{{$item->id}}" class="font-medium text-blue-500 hover:underline pr-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="m590-160 80 80H240q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h360l200 240v480q0 20-8.5 36.5T768-96L560-302q-17 11-37 16.5t-43 5.5q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 23-5.5 43T618-360l102 104v-356L562-800H240v640h350ZM480-360q33 0 56.5-23.5T560-440q0-33-23.5-56.5T480-520q-33 0-56.5 23.5T400-440q0 33 23.5 56.5T480-360Zm0-80Zm0 0Z"/></svg></button>
                 
                    <div id="update-{{$item->id}}" class="text-left drop-shadow-2xl fixed inset-0 z-50 flex items-center justify-center hidden p-5 ">
                        <div class="flex flex-col modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 ">
                        
                            <div class="float-right">
                               <span id=" closeupdate-{{$item->id}}" class="hover:bg-gray-200 rounded-lg">X</span>
                            </div>
                            <div class="flex flex-col">
                                <label class="font-medium text-black uppercase">Entrer votre reclamation :</label>
                                <p class="w-full rounded-lg p-3 h-60 m-2 bg-gray-100 border-gray-600 placeholder-gray-700 text-gray-700" >{{ $item->reclamation }}</p>
                            </div>
                            <div class="float-right">
                                <span class="w-full rounded-lg p-3 h-60 m-2 bg-gray-100 border-gray-600 placeholder-gray-700 text-gray-700" >{{ $item->date }}</span>
                            </div>
                          
                      </div>
                  </div>
                
                  <form action="{{ route('Fonctionnaire.destroy',[ 'id' => $item->id ] ) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-blue-500 hover:underline pr-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></button>
                    </form>

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
         </script>

            @endforeach

        </tbody>
    </table>
</div>

@endsection