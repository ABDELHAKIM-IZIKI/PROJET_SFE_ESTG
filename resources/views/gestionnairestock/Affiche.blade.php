@extends('gestionnairestock.templateGS')

@section('title')
{{$materiels->nom }}
@endsection

@section('content')

<!--image-->
<div class="flex flex-col">
        
   <div>
       <figure class="max-w-lg">
        <img class="h-auto max-w-full rounded-lg" src="{{asset($materiels->image)}}" alt="image description">
        </figure>
  </div>

  <!--display-->
 <div class="flex flex-col">
	
       <div> 
          <label class="text-xs text-black">Categorie :</label><label>{{$nomcategorie}}</label>
       </div>
       <div> 
       <label class="text-xs text-black">Marque :</label><label>{{$nommarque}}</label>
       <div>
       
        <div> 
        <label class="text-xs text-black">Model :</label><label>{{$materiel['model']}}</label>
        </div>
        
        <div> 
         <label class="text-xs text-black">Barcode :</label><label>{{$materiel['barcode']}}</label>
        <div>
        
        <div> 
        <label class="text-xs text-black">Quantité :</label><label>{{$materiel['quantite']}}</label>
        </div>
                
        <div> 
        <label class="text-xs text-black">Date :</label><label>{{$materiel['date']}}</label>
        <div>

        <div class="flex flex-col">
        <label class="text-xs text-black">Quantité :</label>
        <p>{{$materiel['description']}}</p>
        </div> 
     

        <div class="flex flex-col">
            <label class="text-xs text-black">Caracteristiques :  </label>
            <div class="relative overflow-x-auto">

                
        <!--table-->
    <table class=" text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Valeur
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($caracteristiques as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->nom}}
                </th>
                <td class="px-6 py-4">
                    {{$item->valeur}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>  
</div>
 







</div>   















</div>



@endsection