@extends('Auth.templateAu')

@section('content')
<div class="bg-gray-250 p-6 rounded-lg shadow-lg  ">

    <div class="mx-auto"></div>

    <div class="max-w-sm mx-auto"></div>
    <form class=" max-w-sm mx-auto" action="{{route('Auth.role')}}" method="POST">
        
       
        <div class="mb-5">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Votre E-mail : </label>
          <input type="email" id="email" class="w-full bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="test@gmail.com" required />
        </div>
        <div class="mb-5">
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Votre mot de passe : </label>
          <input type="password" id="password" class="w-full bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
        </div>
    
        <div class="flex items-center mb-5">
          <a href="{{route('Auth.role')}}" class="hover:bg-gray-300 p-1  rounded-lg text-blue-700 " >Mot  de  passe  oublié ?</a>
        </div>

        <div class="float-right">
        <button type="submit" class="text-white font-medium rounded-lg text-sm w-full sm:w-auto p-3 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Se connecter</button>
        </div>

    </form>
    <div class="max-w-sm"></div>

    <div class="mx-auto"></div>

</div>  
@endsection
