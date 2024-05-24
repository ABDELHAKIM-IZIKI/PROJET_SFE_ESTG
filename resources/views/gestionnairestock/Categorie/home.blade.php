@extends('gestionnairestock.templateGS')

@section('title')
Les Categories :
@endsection

@section('content')
<div class="bg-gray-300">
<div class="flex flex-col">
    <!--searchbar-->
    <div class="mx-2 ">
        <form method="get" action="{{route('Categorie.search')}}" class="flex m-6 items-center">
            @csrf
            <div class="relative flex">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                </div>
                <input type="search" name="nom" class="rounded-lg p-3 h-10 mx-2  border-gray-600 bg-white-400 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="nom" />

                <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Recherche</span>
                </button>
            </div>
        </form>
    </div>



    <!--ajoute-->
    <div class="">

        <div class="flex flex-row-reverse mx-4 my-3">
            <a id="openCreate" class="rounded-lg h-10 px-4 py-2 w-25 mx-2 bg-blue-600 hover:bg-blue-700 text-white">Ajouter un nouveau Categorie</a>
        </div>

        <div id="Create" class="drop-shadow-2xl fixed inset-0 z-50 flex items-center justify-center hidden p-5 ">
              <div class="flex flex-col modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
              
                <div class="flex-1">
                <span class=""></span>
                <span id="closeCreate" class=" float-right m-2 p-0.5  rounded-lg w-7 my-4 hover:bg-gray-400"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></span>
                </div>
                <label  class="flex-1 block m-3 text-sm font-medium text-black">Enter un nom de nouveau Categorie :</label>
                
                <div class="flex-1">
                    <form method="post" action="{{route('Categorie.create')}}" class="flex  m-2 mb-5 ">
                        @csrf

                        <input type="text" name="nom" class="w-full rounded-lg p-3 h-10 mx-2 bg-gray-300 border-gray-600 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500" placeholder=" " required/>
                       
                        <button type="submit" class="p-1.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                        </button>

                    </form>
                    @error('nom')
                    <span class="flex-1 m-3 text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <!--successajoute-->
 @if (session()->has('success'))
 <div class=" mx-4 my-3  text-sm text-green-800 rounded-lg bg-green-100  p-3 items-center z-0">
     <span class="font-medium">{{ session('success') }}</span>
 </div>
 @endif

        <!--table-->
        <div class="mx-4 my-3">
            <div class="relative overflow-x-auto sm:rounded-lg z-0">
                <br />
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-400 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nom de categorie
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)

                        <tr class="bg-gray-100 border-gray-600 hover:bg-gray-200">


                            <td class="px-6 py-4 text-black">
                                {{ $item->id}}
                            </td>
                            <td class="px-6 py-4 text-black">
                                {{ $item->nom}}
                            </td>
                            <td class="px-6 py-4 text-right flex">
                                
                                <button id="openupdate-{{$item->id}}" class="font-medium text-blue-500 hover:underline pr-2">Modifié</button>
                                
                                <div id="update-{{$item->id}}" class="drop-shadow-2xl fixed inset-0 z-50 flex items-center justify-center hidden p-5 ">
                                    <div class="flex flex-col modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                    
                                      <div class="flex-1">
                                      <span class=""></span>
                                      <span id="closeupdate-{{$item->id}}" class=" float-right m-2 p-0.5  rounded-lg w-7 my-4 hover:bg-gray-400"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></span>
                                      </div>
                                      <label  class="flex-1 block m-3 text-sm font-medium text-black">Modifié le nom de Categorie :</label>
                                      
                                      <div class="flex-1">
                                          <form method="post" action="{{route('Categorie.edit', [ 'id' => $item->id ])}}" class="flex  m-2 mb-5 ">
                                              @csrf
                      
                                              <input type="text" value="{{$item->nom}}" name="nom" class="w-full rounded-lg p-3 h-10 mx-2 bg-gray-300 border-gray-600 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500" placeholder=" " required/>
                                             
                                              <button type="submit" class="p-1.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg></button>
                      
                                          </form>
                                          @error('nom')
                                          <span class="flex-1 m-3 text-red-600">{{ $message }}</span>
                                          @enderror
                                      </div>
                                  </div>
                              </div>
                             
                                
                                
                                <form action="{{ route('Categorie.destroy',[ 'id' => $item->id ] ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-blue-500 hover:underline pr-2">supprimé</button>
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
            <!--pagination-->
            <div class="m-4">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
</div>
<script>
    var modal = document.getElementById("Create");
    var btn = document.getElementById("openCreate");
    var span = document.getElementById("closeCreate");

    btn.onclick = function() {
        modal.classList.remove("hidden");
    }

    span.onclick = function() {
        modal.classList.add("hidden");
    }

</script>
@endsection
