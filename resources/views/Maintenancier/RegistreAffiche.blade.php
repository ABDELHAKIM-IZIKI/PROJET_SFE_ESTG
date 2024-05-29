@extends('Maintenancier.templateM')

@section('title')
Le registre de #ID{{$registre->id}} :
@endsection

@section('content')
<div class="flex flex-col bg-gray-300">

 <!--image-->
 <div class="mb-5 content-center  mx-auto " >
     <figure class="max-w-lg">
     <img class="h-64 object-contain rounded-lg" src="{{asset($registre->materiel->image)}}" alt="image description">
     </figure>
</div>

<!--successmessage-->
@if (session()->has('success'))
<div class="my-4 text-sm text-green-800 rounded-lg bg-green-100  p-3 items-center z-0">
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif

<div class="flex flex-col  mx-auto p-4 ">
	
   
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
     
     <div class=" mt-2"> 
      <label class="font-medium text-black uppercase ">Etat de materiel : </label><label>{{$registre->etat->nom}}</label>
     <div>
     
     <div  class=" mt-2"> 
     <label class="font-medium text-black uppercase ">Lieu de materiel ou Fonctionaire :  </label><label>{{$registre->lieu}}</label>
     </div>
             
     <div class=" mt-2 "> 
     <label class="font-medium text-black uppercase">Date de effectation : </label><label>{{$registre->date}}</label>
     <div>
@if ($registre->rapport)
        <div class=" flex flex-col  mt-2 "> 
            <label class="font-medium text-black uppercase mt-2">Rapport : </label><label>{{$registre->rapport}}</label>
        <div>
@endif
</div>


    
@endsection