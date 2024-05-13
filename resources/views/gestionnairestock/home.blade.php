@extends('gestionnairestock.templateGS')

@section('title')
Matériels et
d’équipement :
@endsection


@section('content')
<!--searchbar-->
<div class="">
    <div class="">
        <form method="get" action="{{route('gestionnairestock.search')}}" class="flex flex-wrap justify-center w-full my-6  items-center ">   
        @csrf
        <div class="relative flex-wrap justify-center  flex  ">
            
            <input type="text" name="nom" class="rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700 " placeholder="nom"  />
            <input type="text" name="model" class="rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700 " placeholder="model"  />
            
            <select name="categories_id" class="items-center flex rounded-lg p-2 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700 ">
            <option selected>Choisir un categorie</option>
            <option value="">Avec no categorie</option>
            @foreach ($categories as $item)
            <option  value="{{$item->id}}">{{$item->nom}}</option>
            @endforeach
            </select>

            <select name="marques_id" class="items-center flex rounded-lg p-2 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700 ">
                <option selected>Choisir un marque</option>
                <option value="">Avec no marque</option>
                @foreach ($marques as $item)
                <option  value="{{$item->id}}">{{$item->nom}}</option>
                @endforeach
                </select>
    <div>
            <input type="text" name="barcode" class="rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700 " placeholder="barcode"  />
           <button id="BARCODE" class="p-2.5   rounded-lg border border-blue-700    bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M40-120v-200h80v120h120v80H40Zm680 0v-80h120v-120h80v200H720ZM160-240v-480h80v480h-80Zm120 0v-480h40v480h-40Zm120 0v-480h80v480h-80Zm120 0v-480h120v480H520Zm160 0v-480h40v480h-40Zm80 0v-480h40v480h-40ZM40-640v-200h200v80H120v120H40Zm800 0v-120H720v-80h200v200h-80Z"/></svg>
           </button>
    </div>      

               <button type="submit" class="w-30 justify-center items-center   p-2.5 ms-2 m-2 text-sm font-medium text-white  rounded-lg border border-blue-700    bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
               <svg class="w-5 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
            
              </button>
          </div>
        </form>
     </div>
</div>
<br/>





<!--ajouterbottun-->
<div class="flex flex-row-reverse ">
    <a href="{{route('gestionnairestock.fill')}}" class=" mr-4 rounded-lg  h-10 px-4 py-2 w-25 mx-2 bg-blue-600 hover:bg-blue-700  text-white ">Ajouter un nouveau utilisateur</a>
</div>
<br/>




<!--Display items-->
<div class="justify-center ml-4">
<div class="p-4  flex flex-wrap pr-0">

    @foreach($materiels as $item)

   <div class="w-96  bg-white border border-gray-200  rounded-lg shadow   p-2 m-2 ">

  
       <a href="route('GestionnairesStock.display')">
        <img class="p-8  object-contain w-64 h-64  rounded-t-lg" src="{{ asset($item->image) }}" alt="product image" />
      </a>

     <div class="px-5 pb-5 start-0 flex flex-col">
        <h5 class="text-xl font-semibold tracking-tight text-gray-900 ">{{$item->nom}}</h5>
        <span class="text-m font-semibold tracking-tight text-gray-800">Marque : 
            @foreach ($marques as $marque)
            @if($item->id==$marque->id) {{$marque->nom}} @endif
            @if($item->id==null)  ---  @endif
            @endforeach</span>
        <span class="text-m font-semibold tracking-tight text-gray-800">Model : {{$item->model}} </span>
        <span class="text-m font-semibold tracking-tight text-gray-800">Date : {{$item->date}} </span>
        <span class="bg-blue-100 text-blue-800 text-m font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800  float-right"> Quantité : {{$item->quantite}} </span>
     </div>
        <div class="mr-3 flex float-right items-center">
            <a href="GestionnairesStock.refer" class="text-white items-center font-medium rounded-lg text-xs h-9 px-1.5 pt-0.5 pb-1 m-1.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Affecté à <br/> fonctionnaire</a>
            <a href="GestionnairesStock.fillEdit" class="text-white font-medium rounded-lg text-sm h-9  p-1.5 m-1.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
            </a>
            <form action="{{ route('gestionnairestock.destroy',[ 'id' => $item->id ] ) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-white font-medium rounded-lg text-sm h-9  p-1.5 m-1.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                </button>
              </form>   
  </div>
 </div>
    @endforeach

</div>
</div>
<!--pagination-->
<div class="m-4">

    {{ $materiels->links() }}
    
    </div>
</div>


    






</div>


@endsection

