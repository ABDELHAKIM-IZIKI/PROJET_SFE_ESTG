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

            <input type="text" name="valeur" class=" w-full rounded-lg p-3 h-10 mx-2  border-gray-600 bg-white-400 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500" placeholder="nom" />
            
            <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Recherche</span>
            </button>
        </div>
    </form>
</div>








@endsection