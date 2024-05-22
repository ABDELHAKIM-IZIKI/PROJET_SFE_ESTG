@extends('gestionnairestock.templateGS')

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

<div class="flex flex-col  mx-auto ">
	
   
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

<div class="flex flex-row  ml-auto ">

   <a href="{{ route('Registre.filledit', $registre->id  ) }}" class="text-white font-medium rounded-lg text-sm h-9  p-1.5 my-3 mr-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
      <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
   </a>

   <a id="openRemove"  class="text-white font-medium rounded-lg text-sm h-9  p-1.5 my-3 mr-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
      <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
   </a>

  <div id="Remove" class="drop-shadow-2xl fixed inset-0 z-50 flex items-center justify-center hidden p-5  ">
      <div class="flex flex-col modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50  overflow-y-auto p-10">
          <div class="text-m font-semibold tracking-tight text-gray-800 mb-10">
              Êtes-vous sûr de vouloir supprimer le  materiel ?
          </div>
          <div class="flex mx-auto">
              <form action="{{ route('Registre.destroy' , $registre->id ) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="mr-10 text-white font-medium rounded-lg text-sm h-9 w-10  p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                      Oui  </button>
              </form>
              <button id="closeRemove" type="submit" class="text-white font-medium rounded-lg  w-10 text-sm h-9 p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                  No </button>
          </div>
      </div>
</div>

<script>
   var modal = document.getElementById("Remove");
   var btn = document.getElementById("openRemove");
   var span = document.getElementById("closeRemove");

   btn.onclick = function() {
       modal.classList.remove("hidden");
   }

   span.onclick = function() {
       modal.classList.add("hidden");
   }

</script>
















</div>
    
@endsection