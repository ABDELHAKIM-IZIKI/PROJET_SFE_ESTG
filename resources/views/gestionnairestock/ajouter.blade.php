@extends('gestionnairestock.templateGS')

@section('title')
Ajouter un nouveau matériel ou équipement :
@endsection

@section('content')

<div class="h-full">
    <form method="POST" action="{{ route('gestionnairestock.create') }}" class="max-w-sm mx-auto">
        @csrf
        <div class="mb-5">
            <label for="Nom" class="block mb-2 text-sm font-medium text-black">Nom :</label>
            <input value="{{ $materiels['nom'] ?? '' }}" type="text" id="Nom" name="nom" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" placeholder="" />
            @error('nom')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="model" class="block mb-2 text-sm font-medium text-black">Model :</label>
            <input value="{{ $materiels['model'] ?? '' }}" type="text" id="model" name="model" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" placeholder="" />
            @error('model')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="marques_id" class="block mb-2 text-sm font-medium text-black">Choisir une marque :</label>
            <select id="marques_id" name="marques_id" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700">
                <option value="" selected></option>
                @foreach ($marques as $item)
                <option value="{{ $item->id }}" {{ isset($user['marques_id']) && $user['marques_id'] == $item->id ? 'selected' : '' }}>{{ $item->nom }}</option>
                @endforeach
            </select>
            @error('marques_id')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="categories_id" class="block mb-2 text-sm font-medium text-black">Choisir une catégorie :</label>
            <select id="categories_id" name="categories_id" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700">
                <option value="" selected></option>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}" {{ isset($user['categories_id']) && $user['categories_id'] == $item->id ? 'selected' : '' }}>{{ $item->nom }}</option>
                @endforeach
            </select>
            @error('categories_id')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-black">Description :</label>
            <textarea id="description" class="w-full rounded-lg p-3 h-40 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" name="description">{{ $materiels['description'] ?? '' }}</textarea>
            @error('description')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="quantite" class="block mb-2 text-sm font-medium text-black">Quantité :</label>
            <input value="{{ $materiels['quantite'] ?? '' }}" type="number" id="quantite" name="quantite" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" placeholder="" />
            @error('quantite')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="barcode" class="block mb-2 text-sm font-medium text-black">Barcode :</label>
            <div class="flex">
                <input value="{{ $materiels['barcode'] ?? '' }}" type="text" id="barcode" name="barcode" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" placeholder="" />
                <button id="BARCODE" class="p-1 rounded-lg border border-blue-700 h-10 w-10 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M40-120v-200h80v120h120v80H40Zm680 0v-80h120v-120h80v200H720ZM160-240v-480h80v480h-80Zm120 0v-480h40v480h-40Zm120 0v-480h80v480h-80Zm120 0v-480h120v480H520Zm160 0v-480h40v480h-40Zm80 0v-480h40v480h-40ZM40-640v-200h200v80H120v120H40Zm800 0v-120H720v-80h200v200h-80Z"/></svg>
                </button>
            </div>
            @error('barcode')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="image" class="block mb-2 text-sm font-medium text-black">Choisir une image :</label>
            <input class="w-full h-10 text-sm border border-gray-300 rounded-lg cursor-pointer bg-white text-black focus:outline-none placeholder-black" accept="image/png, image/jpeg, image/jpg" type="file" id="image" name="image" />
            <span class="text-sm">PNG, JPG ou JPEG (MAX. 600x600px)</span>
            @error('image')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="date" class="block mb-2 text-sm font-medium text-black">Date :</label>
            <input type="date" value="{{ $materiels['date'] ?? '' }}" id="date" name="date" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" />
            @error('date')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-start mb-5">
            <button type="submit" class="rounded-lg h-10 px-4 py-2 w-25 mx-2 bg-blue-600 hover:bg-blue-700 text-white">Ajouter un matériel ou équipement</button>
        </div>
    </form>
</div>

@endsection
