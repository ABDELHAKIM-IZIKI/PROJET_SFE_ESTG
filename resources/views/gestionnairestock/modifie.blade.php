@extends('gestionnairestock.templateGS')

@section('title')
Modifier le  matériel ou l'équipement :
@endsection


@section('content')
<div class="p-4 bg-gray-300 flex flex-col">
    
    <form method="POST" action="{{ route('gestionnairestock.edit') }}" class="max-w-sm  mx-auto" enctype="multipart/form-data">
        @csrf

        <input value="{{ $materiels->id }}" type="number" class="hidden"  name="id"/>

        <div class="mb-5">
            <label for="Nom" class="block mb-2 text-sm font-medium text-black">Nom : <span class="text-red-600">*</span></label>
            <input value="{{ $materiels['nom'] ?? '' }}" type="text" id="Nom" name="nom" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" placeholder="" required/>
            @error('nom')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="model" class="block mb-2 text-sm font-medium text-black">Model : <span class="text-red-600">*</span></label>
            <input value="{{ $materiels['model'] ?? '' }}" type="text" id="model" name="model" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" placeholder="" required/>
            @error('model')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="marques_id" class="block mb-2 text-sm font-medium text-black">Choisir une marque : <span class="text-red-600">*</span></label>
            <select id="marques_id" name="marques_id" class="w-full  rounded-lg p-1 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" required>
               
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
            <label for="quantite" class="block mb-2 text-sm font-medium text-black">Quantité : <span class="text-red-600">*</span></label>
            <input value="{{ $materiels['quantite'] ?? '' }}" type="number" id="quantite" name="quantite" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" placeholder="" required/>
            @error('quantite')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="barcode" class="block mb-2 text-sm font-medium text-black">Barcode :</label>
            <div class="flex m-2">
                <input value="{{ $materiels['barcode'] ?? '' }}" type="text" id="barcode" name="barcode" class="w-full rounded-l-lg p-3 h-10  bg-white border-gray-600 placeholder-gray-700 text-gray-700" placeholder="" />
                <button id="BARCODE" class="p-1 rounded-r-lg border border-blue-700 h-10 w-15 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 ">
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

        <div class="float-right mb-10">
            <button type="submit" class="rounded-lg h-10 px-4 py-2 w-25  bg-blue-600 hover:bg-blue-700 text-white">Modifié ^</button>
        </div>

    </form> 
  
    

<!--  max-w-sm  -->
<div class=" flex flex-col  lg:mx-auto  md:mx-auto">

       
<!--successajoute-->
@if (session()->has('success'))
<div class=" my-2  text-sm text-green-800 rounded-lg bg-green-100  p-3 items-center z-0">
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif
        
       
    <label class="block mb-2 text-sm font-medium text-black">Caractéristiques : </label>
      
    <div class="flex justify-end">
        <button id="openCreate" type="button" class="rounded-lg p-2 mb-2 bg-blue-600 hover:bg-blue-700">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
        </button>
    </div>
    
    

    <div id="Create" class="drop-shadow-2xl fixed inset-0 z-50 flex items-center justify-center hidden p-5 ">
        <div class="flex flex-col modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        
          <div class="flex-1">
          <span class=""></span>
          <span id="closeCreate" class=" float-right m-2 p-0.5  rounded-lg w-7 my-4 hover:bg-gray-400"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></span>
          </div>
          
       
          
          <div class="flex-1">
              <form method="post" action="{{route('Caracteristique.create')}}" class="flex  flex-col m-2 mb-5 pr-4">
                  @csrf
                  <input value="{{ $materiels->id }}" type="number" class="hidden"  name="materiels_id"/>
                  <label  class="flex-1 block m-3 text-sm font-medium text-black">Enter un nom de nouveau  caractère :</label>
                  <input type="text" name="nom" class="w-full rounded-lg p-3 h-10 mx-2 bg-gray-300 border-gray-600 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500" placeholder=" " required/>
                  @error('nom')
                  <span class="flex-1 m-3 text-red-600">{{ $message }}</span>
                  @enderror
                  <label  class="flex-1 block m-3 text-sm font-medium text-black">Et ça valeur :</label>
                  <input type="text" name="valeur" class="w-full rounded-lg p-3 h-10 mx-2 bg-gray-300 border-gray-600 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500" placeholder=" " required/>
                  @error('valeur')
                  <span class="flex-1 m-3 text-red-600">{{ $message }}</span>
                  @enderror
                  <div class=" mt-5">
                  <button type="submit" class="float-right p-1.5 h-10 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      Ajouter</button>
                </div>
              </form>
            
          </div>
      </div>
  </div>
    
    
  <div class="overflow-x-auto">
    <table class="text-sm text-left rtl:text-right text-gray-500">
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
                  <input type="hidden" name="id" value="{{ $item['id'] }}">
                  <input type="text" name="nom" placeholder="Nom de la caractéristique" value="{{ $item['nom'] }}" class="p-2 rounded-lg h-10 bg-gray-100 border-gray-600 placeholder-gray-700 text-gray-700" required>
              </td>
              <td class="p-1 text-black">
                <input type="text" name="valeur" placeholder="Valeur de la caractéristique" value="{{ $item['valeur'] }}" class="p-2 rounded-lg h-10 bg-gray-100 border-gray-600 placeholder-gray-700 text-gray-700" required>
              </td>
              <td class=" p-2 flex flex-inline">
              
                    <button id="openUpdate{{$item->id}}" type="button" class="rounded-lg p-2 h-10 bg-blue-600 hover:bg-blue-700 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg></button>
            
                    <form id="delete{{$item->id}}" action="{{route('Caracteristique.delete', $item['id'])}}" method="POST">
                        @csrf
                        @method('DELETE')
            
                        <button type="submit" class="rounded-lg p-2 h-10 bg-red-600 hover:bg-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="m376-300 104-104 104 104 56-56-104-104 104-104-56-56-104 104-104-104-56 56 104 104-104 104 56 56Zm-96 180q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520Zm-400 0v520-520Z"/></svg>
                        </button>
                    </form>
           


                    <div id="Update{{$item->id}}" class="drop-shadow-2xl fixed inset-0 z-50 flex items-center justify-center hidden p-5 ">
                        <div class="flex flex-col modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                        
                          <div class="flex-1">
                          <span class=""></span>
                          <span id="closeUpdate{{$item->id}}" class=" float-right m-2 p-0.5  rounded-lg w-7 my-4 hover:bg-gray-400"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></span>
                          </div>
                          
                       
                          
                          <div class="flex-1">
                              <form method="post" action="{{route('Caracteristique.modifie'  )}}" class="flex  flex-col m-2 mb-5 pr-4">
                                  @csrf
                                  <input value="{{ $item->id }}" type="number" class="hidden"  name="id"/>
                                  <label  class="flex-1 block m-3 text-sm font-medium text-black">Nom  caractère :</label>
                                  <input type="text" name="nom" value="{{ $item['nom'] }}" class="w-full rounded-lg p-3 h-10 mx-2 bg-gray-300 border-gray-600 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500" placeholder=" " required/>
                                  @error('nom')
                                  <span class="flex-1 m-3 text-red-600">{{ $message }}</span>
                                  @enderror
                                  <label  class="flex-1 block m-3 text-sm font-medium text-black">Et ça valeur :</label>
                                  <input type="text" name="valeur"  value="{{ $item['valeur'] }}" class="w-full rounded-lg p-3 h-10 mx-2 bg-gray-300 border-gray-600 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500" placeholder=" " required/>
                                  @error('valeur')
                                  <span class="flex-1 m-3 text-red-600">{{ $message }}</span>
                                  @enderror
                                  <div class=" mt-5">
                                  <button type="submit" class="float-right p-1.5 h-10 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                      Modifier</button>
                                </div>
                              </form>
                            
                          </div>
                      </div>
                  </div>
            </td>
            
    
            </tr>
    

          
          <script>
            var modal{{$item->id}} = document.getElementById("Update{{$item->id}}");
            var btn{{$item->id}} = document.getElementById("openUpdate{{$item->id}}");
            var span{{$item->id}} = document.getElementById("closeUpdate{{$item->id}}");

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
   




