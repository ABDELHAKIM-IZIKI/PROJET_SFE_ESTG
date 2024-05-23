@extends('gestionnairestock.templateGS')

@section('title')
Modifier le  matériel ou l'équipement :
@endsection

@section('content')

<div class="p-4 bg-gray-300">
    <form method="POST" action="{{ route('gestionnairestock.edit') }}" class="max-w-sm  mx-auto" enctype="multipart/form-data">
        @csrf

        <input value="{{ $materiels['id'] }}" type="number" class="hidden"  name="id"/>

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
            <select id="marques_id" name="marques_id" class="w-full  rounded-lg p-1 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700">
               
                @if($materiels['marques_id']!=null)
                @foreach ($marques as $item)
                @if($materiels['marques_id'] == $item->id) 
                <option  value="{{$item->id}}" selected>{{$item->nom}}</option>
                @endif
                @if($materiels['marques_id'] != $item->id) 
                <option  value="{{$item->id}}" >{{$item->nom}}</option>
                @endif
                @endforeach
                @endif

                @if($materiels['marques_id']==null)
                <option  value="" selected></option>
                @foreach ($marques as $item) 
                <option  value="{{$item->id}}" >{{$item->nom}}</option>
                @endforeach
                @endif
              </select>  
              @error('marques_id')
              <span  class="text-red-600">{{ $message }}</span>
               @enderror
        </div>

        <div class="mb-5">
            <label for="categories_id" class="block mb-2  text-sm font-medium text-black">Choisir une catégorie :</label>
            <select id="categories_id" name="categories_id" class="w-full rounded-lg p-1 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700">
              

                @if($materiels['categories_id']!=null)
                @foreach ($categories as $item)
                @if($materiels['categories_id'] == $item->id) 
                <option  value="{{$item->id}}" selected>{{$item->nom}}</option>
                @endif
                @if($materiels['categories_id'] != $item->id) 
                <option  value="{{$item->id}}" >{{$item->nom}}</option>
                @endif
                @endforeach
                @endif

                @if($materiels['categories_id']==null)
                <option  value="" selected></option>
                @foreach ($categories as $item) 
                <option  value="{{$item->id}}" >{{$item->nom}}</option>
                @endforeach
                @endif
                
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
            <input class="appearance-none w-full h-10 px-3 py-2 text-sm border border-gray-300 rounded-lg cursor-pointer bg-white text-black placeholder-gray-500 focus:outline-none focus:border-blue-500" accept="image/png, image/jpeg, image/jpg" type="file" id="image" name="image" />
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


        <div class="mb-5 mr-2">
           
            <label class="block mb-2 text-sm font-medium text-black">Caractéristiques : <span class="text-red-600">*</span></label>
            <div class=" overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nom</th>
                        <th scope="col" class="px-6 py-3">Valeur</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody id="caracteristiques" class="bg-gray-100 border-gray-600 ">

                    @foreach ($materiels->caracteristiques as $item)
<tr>
    <td class="p-1 text-black">
        <input type="hidden" name="caracteristiques[{{$item['id']}}][id]" value="{{ $item['id'] }}">
        <input type="text" name="caracteristiques[{{$item['id']}}][nom]" placeholder="Nom de la caractéristique" value="{{ $item['nom'] }}" class="p-2 rounded-lg h-10 bg-gray-100 border-gray-600 placeholder-gray-700 text-gray-700" required>
    </td>
    <td class="p-1 text-black">
        <input type="text" name="caracteristiques[{{$item['id']}}][valeur]" placeholder="Valeur de la caractéristique" value="{{ $item['valeur'] }}" class="p-2 rounded-lg h-10 bg-gray-100 border-gray-600 placeholder-gray-700 text-gray-700" required>
    </td>
    <td class="p-1 items-center flex justify-center">
        <button type="button" onclick="deleteCaracteristique({{ $item['id'] }})" class="rounded-lg p-2 bg-red-600 hover:bg-red-700">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
            </svg>
        </button>
    </td>
</tr>
@endforeach

                </tbody>
            </table>
            </div>

            <div class="m-3 mr-0 float-right">
                <button type="button" onclick="addCaracteristique()" class="rounded-lg h-10 px-4 py-2 w-25  bg-blue-600 hover:bg-blue-700 text-white">Ajouter une caractéristique</button>
            </div>
    </div>
    <script>
        let caracteristiqueIndex = 1;

        function addCaracteristique() {
            const caracteristiquesTbody = document.getElementById('caracteristiques');
            const newCaracteristique = document.createElement('tr');
            newCaracteristique.innerHTML = `
                <td class="p-1 text-black">
                    <input type="text" name="caracteristiques[${caracteristiqueIndex}][nom]" placeholder="Nom de la caractéristique" class=" p-2  rounded-lg  h-10  bg-gray-100 border-gray-600 placeholder-gray-700 text-gray-700" required>
                </td>
                <td class="p-1 text-black">
                    <input type="text" name="caracteristiques[${caracteristiqueIndex}][valeur]" placeholder="Valeur de la caractéristique" class=" p-2  rounded-lg  h-10  bg-gray-100 border-gray-600 placeholder-gray-700 text-gray-700" required>
                </td>
                <td class="p-1 items-center flex justify-center">
                        <button type="button" onclick="deleteCaracteristique(this)" class="rounded-lg p-2 bg-red-600 hover:bg-red-700 ">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                        </button>
            
                    </td>
            `;
            caracteristiquesTbody.appendChild(newCaracteristique);
            caracteristiqueIndex++;
        }

        function deleteCaracteristique(button) {
    const row = button.parentElement.parentElement;
    row.remove();
}


    function deleteCaracteristique(id) {
        if (confirm('Are you sure you want to delete this characteristic?')) {
            fetch(`{{ url('/MonSite/Caracteristique/supprimé') }}/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    alert('Failed to delete characteristic.');
                }
            });
        }
    }


    </script>



        <div class="float-right m-5">
            <button type="submit" class="rounded-lg h-10 px-4 py-2 w-25 mx-2 bg-blue-600 hover:bg-blue-700 text-white">Modifié</button>
        </div>

    </form>
</div>

@endsection
