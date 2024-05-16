@extends('gestionnairestock.templateGS')

@section('title')
{{$materiel->nom }}
@endsection

@section('content')


<div class="flex flex-col bg-gray-300 p-4 lg:px-40  ">
     
    <!--image-->
    <div class="mb-5 content-center  mx-auto " >
        <figure class="max-w-lg">
         <img class="h-64 object-contain rounded-lg" src="{{asset($materiel->image)}}" alt="image description">
         </figure>
   </div>

  <!--display-->
 <div class="flex flex-col  px-auto ">
	
   
       <div  class=" mt-2"> 
          <label class="font-medium text-black uppercase ">Categorie : </label><label>{{$nomcategorie['nom'] ?? ''}}</label>
       </div>
       <div  class=" mt-2"> 
       <label class="font-medium text-black uppercase ">Marque : </label><label>{{$nommarque['nom']?? ''}}</label>
       <div>
       
        <div  class=" mt-2"> 
        <label class="font-medium text-black uppercase">Model : </label><label>{{$materiel['model']}}</label>
        </div>
        
        <div class=" mt-2"> 
         <label class="font-medium text-black uppercase ">Barcode : </label><label>{{$materiel['barcode']}}</label>
        <div>
        
        <div  class=" mt-2"> 
        <label class="font-medium text-black uppercase ">Quantité : </label><label>{{$materiel['quantite']}}</label>
        </div>
                
        <div class=" mt-2 "> 
        <label class="font-medium text-black uppercase">Date : </label><label>{{$materiel['date']}}</label>
        <div>
       
@if(!empty($materiel['description']))
        <div class="flex flex-col mt-6 ">
        <label class="font-medium text-black uppercase">Description : </label>
        <p class="font-medium lg:px-20">{{$materiel['description']}}</p>
        </div> 
@endif    

  @if(!empty($caracteristiques[0]))
      
 
  <label class="font-medium text-black uppercase">Caracteristiques :  </label>
            <div class="relative overflow-x-auto">
 <div class=" flex flex-col mt-2 lg:px-20  ">
          

                
        <!--table-->
    <table class="w-full text-sm text-left rtl:text-right text-gray-700 mt-2 ">
        <thead class="text-xs text-gray-600 uppercase bg-gray-200 ">
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
            <tr class="bg-white border-b  ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{$item->nom}}
                </th>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{$item->valeur}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>  
@endif 
</div>
 







</div>   















</div>



@endsection