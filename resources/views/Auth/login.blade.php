@extends('Auth.templateAu')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-300">
   

        <form class="max-w-sm w-full p-6 bg-white rounded-lg shadow-md" action="{{ route('Auth.role') }}" method="POST" >
            @csrf 

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Votre E-mail:</label>
                <input type="email" id="email" name="email" class="w-full bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" placeholder="test@gmail.com" required>
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Votre mot de passe:</label>
                <input type="password" id="password" name="password" class="w-full bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" placeholder="*********" required>
            </div>

            <div class="flex  mb-5">
                <a href="{{ route('Auth.Modifie_MDP') }}" class="text-blue-700 hover:bg-gray-300 p-1 rounded-lg mr-3">Mot de passe oublié?</a>
            </div> 

            <div class="text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center">Se connecter</button>
            </div>

        </form>

 
</div>
@endsection
