



@extends('gestionnairestock.templateGS')

@section('title')
Modifier le registre de #ID{{$registre->id}} :
@endsection

@section('content')

<div class="flex flex-col  bg-gray-300">

    <div class="mb-5 content-center  mx-auto " >
        <figure class="max-w-lg">
        <img class="h-64 object-contain rounded-lg" src="{{asset($registre->materiel->image)}}" alt="image description">
        </figure>
   </div>
	
        <form method="POST" action="{{ route('Registre.edit') }}" class="max-w-sm mx-auto" >
            @csrf

            <input value="{{ $registre['id'] }}" type="number" class="hidden"  name="id"/>


    <div  class=" mt-2"> 
       <label class="font-medium text-black uppercase ">Fonctionaire  : </label><label>{{$registre->user->nom}} {{$registre->user->prenom}}</label>
    </div>
    <div  class=" mt-2"> 
        <label class="font-medium text-black uppercase ">Division  : </label><label>{{$registre->user->division}}</label>
     </div>
     <div  class=" mt-2"> 
        <label class="font-medium text-black uppercase ">Service  : </label><label>{{$registre->user->service}}</label>
     </div>
    <div  class=" mt-2"> 
    <label class="font-medium text-black uppercase ">Nom de materiel : </label><label>{{$registre->materiel->nom}}</label>
    <div>
    
     <div  class=" mt-2"> 
     <label class="font-medium text-black uppercase">Model de materiel : </label><label>{{$registre->materiel->model}}</label>
     </div>

     <div  class=" mt-2"> 
        <label class="font-medium text-black uppercase">Marque de materiel : </label><label>{{$registre->materiel->marque->nom}}</label>
        </div>
     
     <div class=" mt-4"> 
      <label class="font-medium text-black uppercase ">Etat de materiel : </label>     
      
      <select  name="etats_id" class="w-full  rounded-lg p-1 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700">
               
        @if($registre->etat['nom'] !=null)
        @foreach ($etat as $item)
        @if($registre->etat['nom'] == $item->nom) 
        <option  value="{{$item->id}}" selected>{{$item->nom}}</option>
        @endif
        @if($registre->etat['nom'] != $item->nom) 
        <option  value="{{$item->id}}" >{{$item->nom}}</option>
        @endif
        @endforeach
        @endif

        @if($registre->etat['nom']==null)
        <option  value="" selected></option>
        @foreach ($etat as $item) 
        <option  value="{{$item->id}}" >{{$item->nom}}</option>
        @endforeach
        @endif
      </select>  
      @error('etats_id')
      <span  class="text-red-600">{{ $message }}</span>
       @enderror
</div>

     
     <div  class="mt-2"> 
     <label class="font-medium text-black uppercase ">Lieu de materiel ou Fonctionaire :  </label>  
     <input value="{{ $registre['lieu'] ?? ''  }}" type="text" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700"  name="lieu"/> 
     @error('lieu')
     <span  class="text-red-600">{{ $message }}</span>
      @enderror
   
     </div>
             
     <div class=" mt-2 "> 
     <label class="font-medium text-black uppercase">Date de effectation : </label> 
     <input type="date" value="{{ $registre['date'] ?? '' }}" id="date" name="date" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" />
     @error('date')
     <span  class="text-red-600">{{ $message }}</span>
      @enderror
     <div>

        <div class=" flex flex-col mt-2 "> 
            <label class="font-medium text-black uppercase mt-2">Rapport : </label> 
            <textarea  class="w-full rounded-lg p-3 h-40 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" name="rapport">{{ $registre['rapport'] ?? '' }}</textarea>
            @error('rapport')
            <span  class="text-red-600">{{ $message }}</span>
             @enderror
        <div>

            <div class="float-right mt-2 mb-4">
                <button id="closeRemove" type="submit" class="text-white font-medium rounded-lg   text-sm p-1.5   text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                    Modifié </button>
            </div>

    </form>
</div>
@endsection