@extends('admin.tempalteAD')

@section('content')

 <div class="px-4  flex flex-col  bg-gray-300">
 <!--titre-->
  <div><h1 class="text-4xl  text-black  text-black font-bold no-italic ">Modifié l'utilisateur : </h1><br/></div>



  <div>
    <form method="POST" action="{{route('admin.edit')}}" class="max-w-sm mx-auto">
        @csrf
        @method('POST')
        
        <input value="{{ $user['id'] }}" type="number" class="hidden"  name="id"/>
          
        <div class="mb-5">
          <label for="Nom" class="block mb-2 text-sm font-medium text-black ">Nom</label>
          <input value="{{ $user['nom'] }}" type="text" id="Nom" name="nom"  class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="se nom"  />
          @error('nom')
            <span  class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

 
        <div class="mb-5">
          <label for="Prenom" class="block mb-2 text-sm font-medium text-black ">Prenom</label>
          <input value="{{ $user['prenom']}}" type="text" id="Prenom" name="prenom"  class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="se prenom"  />
          @error('prenom')
          <span  class="text-red-600">{{ $message }}</span>
          @enderror
        </div>
          
        <div class="mb-5">
            <label for="role" class="block mb-2 text-sm font-medium text-black ">Choisir un role</label>
            <select id="role" name="roles_id"  class="w-full rounded-lg p-2 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700"  >        
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
             

        </div>

        <div class="mb-5">
            <label for="Division" class="block mb-2 text-sm font-medium text-black ">Division</label>
            <input  value="{{ $user['division']}}" type="text" id="Division"  name="division" class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="se téléphone"  />
            @error('division')
            <span  class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

          <div class="mb-5">
            <label for="Service" class="block mb-2 text-sm font-medium text-black ">Service</label>
            <input  value="{{ $user['service']}}" type="text" id="Service" name="service"  class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="se téléphone"  />
            @error('service')
            <span  class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-5">
            <label for="Tel" class="block mb-2 text-sm font-medium text-black ">N° Téléphone</label>
            <input  value="{{ $user['tel']}}" type="text" id="Tel" name="tel" class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="se téléphone"  />
            @error('tel')
            <span  class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

          <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-black ">Email</label>
            <input  value="{{ $user['email']}}" type="email" id="email" name="email" class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="se email"  />
            @error('email')
            <span  class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-5">
         <button id="button" type="button"  class="rounded-lg  h-10 px-4 py-2 w-25 mx-2 bg-blue-600 hover:bg-blue-700  text-white ">Changé le Mot de passe</button>
         
      </div>



      <div id='mdp' class='{{$hidden}}'>

        <div class="mb-5">
          <label for="password" class="block mb-2 text-sm font-medium text-black ">Votre Mot de passe admin<span  class="text-red-600">*</span></label>
          <input  type="password" id="password" name="adminpassword" class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="********"  />
           @error('adminpassword')
           <span class="text-red-600">{{ $message }}</span>
           @enderror
           @if ($adminpassword)
            <span class="font-medium text-red-600">{{ $adminpassword }}</span>
            @endif
        </div>

        <div id='mdp' class="mb-5  ">
            <label for="password" class="block mb-2 text-sm font-medium text-black ">Changé le Mot de passe <span  class="text-red-600">*</span></label>
            <input  type="password" id="password" name="password" class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="********"   />
             @error('password')
             <span class="text-red-600">{{ $message }}</span>
             @enderror
          </div>


          <div class="mb-5">
            <label for="Cpassword" class="block mb-2 text-sm font-medium text-black ">Confirmation de Mots de passe <span  class="text-red-600">*</span></label>
            <input type="password" id="Cpassword" name="Cpassword" class="w-full rounded-lg p-3 h-10 w-30  m-2 bg-white-400 border-gray-600 placeholder-gray-700 text-gray-700" placeholder="********"   />
            @error('Cpassword')
            <span  class="text-red-600">{{ $message }}</span>
            @enderror
            @if ($CpasswordMessage)
            <span class="font-medium text-red-600">{{ $CpasswordMessage }}</span>
            @endif
          </div>
         </div>

        <div class="">
        <button type="submit" class="rounded-lg  h-10 px-4 py-2 w-25 mx-2 bg-blue-600 hover:bg-blue-700  text-white">Modifier l'utilisateur</button>
      </form>
      
</div>


<script>
   document.getElementById('button').addEventListener('click',function(){
           
           document.getElementById('mdp').classList.toggle('hidden');

        });

</script>




 
</div>

@endsection
