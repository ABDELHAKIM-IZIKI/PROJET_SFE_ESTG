@extends('gestionnairestock.templateGS')

@section('title')
Modifier le matériel ou l'équipement :
@endsection

@section('content')
<div class="p-4 bg-gray-300">
    <form method="POST" action="{{ route('gestionnairestock.edit') }}" class="max-w-sm mx-auto" enctype="multipart/form-data">
        @csrf

        <input value="{{ $materiels->id }}" type="hidden" name="id"/>

        <!-- Other input fields... -->

        <div class="mb-5 mr-2">
            <label class="block mb-2 text-sm font-medium text-black">Caractéristiques : <span class="text-red-600">*</span></label>
            <div class="overflow-x-auto">
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
                                <input type="hidden" name="caracteristiques[{{ $loop->index }}][id]" value="{{ $item['id'] }}">
                                <input type="text" name="caracteristiques[{{ $loop->index }}][nom]" placeholder="Nom de la caractéristique" value="{{ $item['nom'] }}" class="p-2 rounded-lg h-10 bg-gray-100 border-gray-600 placeholder-gray-700 text-gray-700" required>
                            </td>
                            <td class="p-1 text-black">
                                <input type="text" name="caracteristiques[{{ $loop->index }}][valeur]" placeholder="Valeur de la caractéristique" value="{{ $item['valeur'] }}" class="p-2 rounded-lg h-10 bg-gray-100 border-gray-600 placeholder-gray-700 text-gray-700" required>
                            </td>
                            <td class="p-1 items-center flex justify-center">
                                <button type="button" onclick="deleteCaracteristique(this)" class="rounded-lg p-2 bg-red-600 hover:bg-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-3 mr-0 float-right">
                <button type="button" onclick="addCaracteristique()" class="rounded-lg h-10 px-4 py-2 w-25 bg-blue-600 hover:bg-blue-700 text-white">Ajouter une caractéristique</button>
            </div>
        </div>
        <script>
            let caracteristiqueIndex = {{ $materiels->caracteristiques->count() }};

            function addCaracteristique() {
                const caracteristiquesTbody = document.getElementById('caracteristiques');
                const newCaracteristique = document.createElement('tr');
                newCaracteristique.innerHTML = `
                    <td class="p-1 text-black">
                        <input type="hidden" name="caracteristiques[${caracteristiqueIndex}][id]" value="">
                        <input type="text" name="caracteristiques[${caracteristiqueIndex}][nom]" placeholder="Nom de la caractéristique" class="p-2 rounded-lg h-10 bg-gray-100 border-gray-600 placeholder-gray-700 text-gray-700" required>
                    </td>
                    <td class="p-1 text-black">
                        <input type="text" name="caracteristiques[${caracteristiqueIndex}][valeur]" placeholder="Valeur de la caractéristique" class="p-2 rounded-lg h-10 bg-gray-100 border-gray-600 placeholder-gray-700 text-gray-700" required>
                    </td>
                    <td class="p-1 items-center flex justify-center">
                        <button type="button" onclick="deleteCaracteristique(this)" class="rounded-lg p-2 bg-red-600 hover:bg-red-700">
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
        </script>

        <div class="float-right m-5">
            <button type="submit" class="rounded-lg h-10 px-4 py-2 w-25 mx-2 bg-blue-600 hover:bg-blue-700 text-white">Modifié</button>
        </div>
    </form>
</div>
@endsection
