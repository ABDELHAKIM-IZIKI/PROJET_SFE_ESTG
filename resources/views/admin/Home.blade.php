@extends('admin.tempalteAD')

@section('content')

 <div class="px-4  h-fill flex flex-col bg-gray-300 ">
 <!--titre-->
  <div><h1 class="text-4xl text-black font-bold no-italic ">Les utilisateurs : </h1><br/></div>


 <!--searchbar-->

 <div class="px-4 ">
    <form method="get" action="{{route('admin.search')}}" class="">   
        @csrf
        <div class=" flex flex-wrap  lg:flex-inline justify-center items-center  ">
            

            <div class="flex   w-full lg:w-1/2 m-1.5">
                <input type="search" name="valeur" class=" rounded-lg p-3 h-10 w-full bg-white border-gray-600 placeholder-gray-700 text-gray-700" placeholder="recherche " />
            </div> 
            
            <select name="choix" class="rounded-lg h-10 p-2 w-30  m-2 bg-white-400 border-white-600 placeholder-gray-700 text-gray-700 focus:ring-blue-500 focus:border-blue-500">
                <option value="" >Choisir un role</option>
                @foreach ($roles as $item)
                <option  value="{{$item->id}}">{{$item->nom}}</option>
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

 <!--ajoutebuttom-->
 <div class="flex flex-row-reverse ">
     <a href="{{route('admin.fill')}}" class=" rounded-lg  h-10 px-4 py-2 w-25 mx-2 my-2 bg-blue-600 hover:bg-blue-700  text-white ">Ajouter un nouveau utilisateur</a>
 </div>

 @if (session()->has('success'))
<div class=" my-3 text-sm text-green-800 rounded-lg bg-green-100  p-3 items-center">
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif


<!--table-->
<div class="relative overflow-x-auto my-2 sm:rounded-lg ">

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-black uppercase bg-gray-400 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Prenom
                </th>
                <th scope="col" class="px-6 py-3">
                    Tél
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Division
                </th>
                <th scope="col" class="px-6 py-3">
                    Service
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
           
            <tr class=" bg-white  border-gray-600  hover:bg-gray-100">

                
                <th scope="row" class="px-6  font-medium  whitespace-nowrap text-black">
                    {{ $item->id }}
                </th>
                <td class="px-6 py-4 text-black">
              @foreach ($roles as $role)
                  @if ($role->id==$item->roles_id)
                 {{$role->nom}} 
                  @endif
              @endforeach
                   
                 </td>
                <td class="px-6 py-4 text-black">
                   {{ $item->nom}}
                </td>
                <td class="px-6 py-4 text-black">
                    {{ $item->prenom}}
                </td>
                <td class="px-6 py-4 text-black">
                    {{($item->tel)}}
                </td>
                <td class="px-6 py-4 text-black">
                    {{ $item->email}}
                </td>
                <td class="px-6 py-4 text-black">
                    {{ $item->division}}
                </td>
                <td class="px-6 py-4 text-black">
                    {{$item->service}}
                </td>
                <td class="px-6 py-4 text-right flex">
                    <a href="{{route('admin.filledit',[ 'id' => $item->id ] )}}" class="rounded-lg text-sm h-9  p-1.5 m-1.5 hover:bg-white"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg></a>
                    
                    <button id="openRemove-{{$item->id}}"  class=" rounded-lg text-sm h-9  p-1.5 m-1.5 hover:bg-white ">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></button>

                      <div id="Remove-{{$item->id}}" class="drop-shadow-2xl fixed inset-0 z-50 flex items-center justify-center hidden fixed  ">
                        <div class="flex flex-col modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50  overflow-y-auto p-10">
                           
    
                                <form action="{{ route('admin.destroy',[ 'id' => $item->id ] ) }}" method="post" class="flex flex-col items-center ustify-center">
                                    @csrf
                                    @method('DELETE')

                                    <div class="text-m font-semibold tracking-tight text-gray-800 mb-10">
                                        Êtes-vous sûr de vouloir supprimer le  utilisateur {{ $item->nom}} {{ $item->prenom }} ?
                                    </div>

                                    <div class=" mb-5">
                                        <label for="password" class="block mb-2 text-sm font-medium text-black ">Votre Mot de passe admin<span  class="text-red-600">*</span></label>
                                        <input  type="password" id="password" name="adminpassword" class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-gray-300 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="********"  required/>
                                         @if ($adminpassword)
                                          <span class="font-medium text-red-600">{{ $adminpassword }}</span>
                                          @endif
                                    </div>
                                    
                                    
                                    <div class=" mb-5 ">
                                    <button type="submit" class="mr-10 text-white font-medium rounded-lg text-sm h-9 w-10  p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                        Oui</button>

                                        <button id="closeRemove-{{$item->id}}" type="button" class="text-white font-medium rounded-lg  w-10 text-sm h-9 p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                            No </button>
                                    </div>
                                </form>
                             
                        
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
                </td>
           

              </tr>
            
      
             @endforeach
           
        </tbody>
    </table>
</div>
<!--pagination-->
<div class="m-4">
    {{ $users->links() }}
    </div>


</div>

</div>
@endsection


