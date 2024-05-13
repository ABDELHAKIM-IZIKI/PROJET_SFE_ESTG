@extends('gestionnairestock.templateGS')

@section('title')
Les Categories :
@endsection  


@section('content')
    <!--searchbar-->
  <div class="mx-2">
    <form method="get" action="{{route('Categorie.search')}}" class="flex m-6 items-center">   
    @csrf
    <div class="relative flex ">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        </div>
        <input type="text" name="nom" class="rounded-lg p-3 h-10  mx-2 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="nom"  />

    
    <button type="submit" class=" p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
        <span class="sr-only">Recherche</span>
    </button>
    </form></div>
 </div>


<div class="flex flex-col">
 <br/>
 <!--ajoutebuttom-->
 <div class="flex flex-row-reverse">
     <a id="Ajoute" class=" rounded-lg  h-10 px-4 py-2 w-25 mx-2 bg-blue-600 hover:bg-blue-700  text-white  ">Ajouter un nouveau role</a>
     
     <div id="Create" class="mx-2 hidden">
        <form method="post" action="{{route('Categorie.create')}}" class="flex m-6 items-center">   
        @csrf
        <div class=" ">
            <div class=" ps-3 pointer-events-none">
            </div>
            <input type="text" name="nom" class="rounded-lg p-3 h-10  mx-2 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="nom"  />
    
        
        <button type="submit" class=" p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
        </button>
        </form></div>
 </div>


 <br/>
<!--table-->
<div>
<div class="relative overflow-x-auto  sm:rounded-lg">
    <br/>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
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
           
            <tr class=" bg-gray-700  border-gray-600  hover:bg-gray-600">


                <td class="px-6 py-4 text-white">
                   {{ $item->id}}
                </td>
                <td class="px-6 py-4 text-white">
                    {{ $item->nom}}
                </td>
                <td class="px-6 py-4 text-right flex">
                    <a href="{{route('Categories.filledit', [ 'id' => $item->id ])}}" class="font-medium  text-blue-500 hover:underline pr-2">Modifié</a>
                    <form action="{{ route('Categories.filledit',[ 'id' => $item->id ] ) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-blue-500 hover:underline pr-2">supprimé</button>
                      </form>
                    
                </td>
           

              </tr>
            
      
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
<script>
     document.getElementById('Ajoute').addEventListener('click',function(){
           
           document.getElementById('Create').classList.toggle('hidden');

        });
</script>



@endsection