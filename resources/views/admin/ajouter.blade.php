<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Administrateurs</title>
</head>
<body>
 <!--button-->
 <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
   <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>


  <!--sidebar-->
 <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full flex flex-col px-3 py-4 overflow-y-auto bg-gray-50 bg-white">
         <div class="m-2 text-xl lg:hidden  md:hidden"><button class="float-end" id="buttonx">X</button></div>
         <div class="m-2 mb-5 text-xl text-black font-bold no-italic"><span>Service gestion des  matériels  et équipements</span></div>
       <ul class="space-y-2 font-medium">
          <li>
            <a href="{{route('home')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
                <img src="https://super.so/icon/dark/home.svg"/>
                <span class="ms-3">Accueil</span>
             </a>
          </li>
          
         <li>
            <a href="{{route('admin.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
               <img src="https://super.so/icon/dark/users.svg" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Gérer les utilisateurs</span>
               
            </a>
         </li>
         
         <li>
           <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
              <img src="https://super.so/icon/dark/log-out.svg" alt="">
              <span class="flex-1 ms-3 whitespace-nowrap">Déconnecter</span>
           </a>
        </li>
    </div>
 </aside>
 








 <div class="p-4 h-fill flex flex-col sm:ml-64 bg-gray-300">
 <!--titre-->
  <div><h1 class="text-4xl text-black font-bold no-italic ">Ajouter un nouveau utilisateur : </h1><br/></div>
<!--form--> 
<div>
    <form method="POST" action="{{route('admin.create')}}" class="max-w-sm mx-auto">
        @csrf
        <div class="mb-5">
          <label for="Nom" class="block mb-2 text-sm font-medium text-black ">Nom  <span  class="text-red-600">*</span></label>
          <input value="{{ $user['nom'] ?? ''}}" type="text" id="Nom" name="nom"  class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="se nom" required />
          @error('nom')
            <span  class="text-red-600">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-5">
          <label for="Prenom" class="block mb-2 text-sm font-medium text-black ">Prenom <span  class="text-red-600">*</span></label>
          <input value="{{ $user['prenom'] ?? ''}}" type="text" id="Prenom" name="prenom"  class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="se prenom" required />
          @error('prenom')
          <span  class="text-red-600">{{ $message }}</span>
          @enderror
        </div>
          
        <div class="mb-5">
            <label for="role" class="block mb-2 text-sm font-medium text-black ">Choisir un role <span  class="text-red-600">*</span></label>
            <select id="role" name="roles_id"  class="w-full rounded-lg p-2 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" required >
               @if (empty($user['roles_id']))         
               <option value="" selected></option>
                @foreach ($roles as $item)
                <option  value="{{$item->id}}">{{$item->nom}}</option>
                @endforeach
              </select>  
              @error('roles_id')
              <span  class="text-red-600">{{ $message }}</span>
               @enderror
               @endif
               
               @if (isset($user['roles_id']))         
                @foreach ($roles as $item)
                @if($user['roles_id'] == $item->id) 
                <option  value="{{$item->id}}" selected>{{$item->nom}}</option>
                @endif
                @if($user['roles_id'] != $item->id) 
                <option  value="{{$item->id}}" >{{$item->nom}}</option>
                @endif
                @endforeach
              </select>  
              @error('roles_id')
              <span  class="text-red-600">{{ $message }}</span>
               @enderror
               @endif






        </div>

        <div class="mb-5">
            <label for="Division" class="block mb-2 text-sm font-medium text-black ">Division <span  class="text-red-600">*</span></label>
            <input  value="{{ $user['division'] ?? ''}}" type="text" id="Division"  name="division" class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="se téléphone" required />
            @error('division')
            <span  class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

          <div class="mb-5">
            <label for="Service" class="block mb-2 text-sm font-medium text-black ">Service <span  class="text-red-600">*</span></label>
            <input  value="{{ $user['service'] ?? ''}}" type="text" id="Service" name="service"  class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="se téléphone" required />
            @error('service')
            <span  class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="Tel" class="block mb-2 text-sm font-medium text-black ">N° Téléphone <span  class="text-red-600">*</span></label>
            <input  value="{{ $user['tel'] ?? ''}}" type="text" id="Tel" name="tel" class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="se téléphone" required/>
            @error('tel')
            <span  class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

          <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-black ">Email <span  class="text-red-600">*</span></label>
            <input  value="{{ $user['email'] ?? ''}}" type="email" id="email" name="email" class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="se email" required />
            @error('email')
            <span  class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
         
        <div class="mb-5">
          <label for="password" class="block mb-2 text-sm font-medium text-black ">Votre Mot de passe admin<span  class="text-red-600">*</span></label>
          <input  type="password" id="password" name="adminpassword" class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="********"  required/>
           @error('adminpassword')
           <span class="text-red-600">{{ $message }}</span>
           @enderror
           @if ($adminpassword)
            <span class="font-medium text-red-600">{{ $adminpassword }}</span>
            @endif
        </div>

          <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-black ">Mot de passe <span  class="text-red-600">*</span></label>
            <input  type="password" id="password" name="password" class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="********"  required/>
             @error('password')
             <span class="text-red-600">{{ $message }}</span>
             @enderror
             
          </div>

          <div class="mb-5">
            <label for="Cpassword" class="block mb-2 text-sm font-medium text-black ">Confirmation de Mots de passe <span  class="text-red-600">*</span></label>
            <input type="password" id="Cpassword" name="Cpassword" class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="********"  required />
            @error('Cpassword')
            <span  class="text-red-600">{{ $message }}</span>
            @enderror
            @if ($CpasswordMessage)
            <span class="font-medium text-red-600">{{ $CpasswordMessage }}</span>
            @endif
          </div>

        <div class="flex items-start mb-5">
        <button type="submit" class="rounded-lg  h-10 px-4 py-2 w-25 mx-2 bg-blue-600 hover:bg-blue-700  text-white">Ajouter l'utilisateur</button>
      </form>
      
</div>





 
</div>




 <script>
document.getElementById('buttonx').addEventListener('click',function(){ document.getElementById('default-sidebar').classList.toggle('hidden'); });

        document.querySelector('[data-drawer-toggle="default-sidebar"]').addEventListener('click', function() {
   document.getElementById('default-sidebar').classList.toggle('-translate-x-full');

   document.querySelector('[data-drawer-target="default-sidebar"]').addEventListener('click', function() {
   document.getElementById('default-sidebar').classList.toggle('hidden');
});
});
</script>
    
</body>
</html>