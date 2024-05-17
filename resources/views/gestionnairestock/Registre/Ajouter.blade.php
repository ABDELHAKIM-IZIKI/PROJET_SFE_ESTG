@extends('gestionnairestock.templateGS')

@section('title')
Affectation materiel ou équipement :
@endsection

@section('content')
<div class="flex flex-col items-center bg-gray-300 p-4 ">

    <!-- Search Bar -->
    <div class="mb-4 w-full max-w-md">
        <form method="get" action="{{route('Registre.SearchUser')}}" class="flex items-center">
            <input value="{{$materiels_id}}" type="number" name="id" class="hidden"/>
            <input type="text" name="valeur" class="w-full rounded-lg p-3 h-10 mx-2 border-gray-600 bg-white placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500" placeholder="recherche"/>
            <button type="submit" class="p-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </button>
        </form>
    </div>

   
    <div class=" ">
        <form action="{{ route('Registre.refer') }}" method="post" class=" max-w-5xl">
            @csrf
             <!-- Table -->
  
             

             <table class="wrelative overflow-x-auto  sm:rounded-lg">
                <thead class="text-xs text-gray-700 uppercase bg-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nom</th>
                        <th scope="col" class="px-6 py-3">Prenom</th>
                        <th scope="col" class="px-6 py-3">Division</th>
                        <th scope="col" class="px-6 py-3">Service</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr class="bg-gray-100 border-b border-gray-200 hover:bg-gray-200">
                        <td class="px-6 py-4 text-black">{{ $item->nom }}</td>
                        <td class="px-6 py-4 text-black">{{ $item->prenom }}</td>
                        <td class="px-6 py-4 text-black">{{ $item->division }}</td>
                        <td class="px-6 py-4 text-black">{{ $item->service }}</td>
                        <td class="px-6 py-4">
                            <input type="radio" value="{{ $item->id }}" name="users_id" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>



            <!-- Pagination -->
            <div class="m-4">
                {{ $users->links() }}
                <input value="{{$materiels_id}}" type="number" class="hidden" name="materiels_id"/>
            </div>

            <!-- Form Fields -->
            <div class="w-full max-w-md mx-auto">
                <input value="{{$materiels_id}}" type="number" class="hidden" name="materiels_id"/>
                
                <div class="mt-4">
                    <label class="font-medium text-black uppercase">Etat de materiel :</label>
                    <select name="etats_id" class="w-full rounded-lg p-1 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700">
                        <option value="" selected></option>
                        @foreach ($etats as $item)
                        <option value="{{$item->id}}">{{$item->nom}}</option>
                        @endforeach
                    </select>
                    @error('etats_id')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label class="font-medium text-black uppercase">Lieu de materiel ou Fonctionaire :</label>
                    <input type="text" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" name="lieu"/>
                    @error('lieu')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label class="font-medium text-black uppercase">Date de affectation :</label>
                    <input type="date" id="date" name="date" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700"/>
                    @error('date')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label class="font-medium text-black uppercase">Rapport :</label>
                    <textarea class="w-full rounded-lg p-3 h-40 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" name="rapport"></textarea>
                    @error('rapport')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-center mt-4">
                    <button class="mr-10 text-white font-medium rounded-lg text-sm h-9 p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                        Oui, Affecté
                    </button>
                    <a href="{{route('GestionnairesStock.index')}}" class="text-white font-medium rounded-lg text-sm h-9 p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                        No, Affecté
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
