@extends('gestionnairestock.templateGS')

@section('title')
Le Registre :
@endsection

@section('content')
 <!--searchbar-->
 <div class="mx-2 items-center ">
    <form method="get" action="{{route('Registre.search')}}" class="flex m-6  ">
        @csrf
        <div class="relative flex ">
            <div class="flex items-center ps-3 pointer-events-none">
            </div>

            <input type="text" name="valeur" class=" w-full rounded-lg p-3 h-10 mx-2  border-gray-600 bg-white-400 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500" placeholder="recherche par nom/prenom/tire/model/lieu" />
            
            <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </button>
        </div>
    </form>
</div>

<!--table-->
<div class="mx-4 my-3">
    <div class="relative overflow-x-auto sm:rounded-lg z-0">
        <br />
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nom
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prenom
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nom de materiel
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Model
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lieu
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
                @foreach ($registres as $item)

                <tr class="bg-gray-100 border-gray-600 hover:bg-gray-200">


                    <td class="px-6 py-4 text-black">
                        {{$item->user->nom}}
                    </td>
                    <td class="px-6 py-4 text-black">
                        {{$item->user->prenom}}
                    </td>
                    <td class="px-6 py-4 text-black">
                        {{$item->materiel->nom}}
                    </td>
                    <td class="px-6 py-4 text-black">
                        {{$item->materiel->model}}
                    </td>
                    <td class="px-6 py-4 text-black">
                        lieu
                    </td>
                    <td class="px-6 py-4 text-black">
                        date
                    </td>

                    <td class="px-6 py-4 text-right flex">
                        
                        
                        <a id="$$$$$$$" class="font-medium text-blue-500 hover:underline pr-2">Affiche</a>
                        <button class="flex justify-content font-medium text-blue-500 hover:underline pr-2"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M520-120v-80h80v80h-80Zm-80-80v-200h80v200h-80Zm320-120v-160h80v160h-80Zm-80-160v-80h80v80h-80Zm-480 80v-80h80v80h-80Zm-80-80v-80h80v80h-80Zm360-280v-80h80v80h-80ZM180-660h120v-120H180v120Zm-60 60v-240h240v240H120Zm60 420h120v-120H180v120Zm-60 60v-240h240v240H120Zm540-540h120v-120H660v120Zm-60 60v-240h240v240H600Zm80 480v-120h-80v-80h160v120h80v80H680ZM520-400v-80h160v80H520Zm-160 0v-80h-80v-80h240v80h-80v80h-80Zm40-200v-160h80v80h80v80H400Zm-190-90v-60h60v60h-60Zm0 480v-60h60v60h-60Zm480-480v-60h60v60h-60Z"/></svg>
                        </button>
                    
                    
                    </td>
                       

                @endforeach

            </tbody>
        </table>
    </div>








@endsection