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

                <tr class="bg-gray-100 border-gray-600 hover:bg-gray-200 z-0">


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
                        {{$item->lieu}} 
                    </td>
                    <td class="px-6 py-4 text-black">
                        {{$item->date}}   
                    </td>

                    <td class="px-6 py-4 text-right flex">
                        
                        
                        <a href="{{route('Registre.display', $item->id )}}" class="font-medium text-blue-500 hover:underline p-2 mr-2 hover:bg-gray-300 rounded-lg">Affiche</a>
                        <a href="{{route('Registre.downloadQR', $item->id )}}" class="w-9 h-9 p-1 hover:bg-gray-300 rounded-lg"><img src="{{asset('assets\images\download_11414370.png')}}" alt=""></a>
    
                    
                    
                    </td>
                       

                @endforeach

            </tbody>
        </table>
    </div>








@endsection