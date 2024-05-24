@extends('Auth.templateAu')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-300">
    <form class="max-w-sm w-full p-10 bg-white rounded-lg shadow-md" action="{{ route('Auth.role') }}" method="POST">
        @csrf

        <div class="mb-5">
           <span class="block text-sm text-gray-600 font-medium ">
                Entrez l'adresse e-mail avec laquelle vous vous êtes inscrit précédemment pour recevoir un code  dans votre boîte afin de modifier votre mot de passe
            </span>
        </div>


        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Votre E-mail:</label>
            <input type="email" id="email" name="email" class="w-full bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" placeholder="test@gmail.com" required>
            @error('email')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        
        @if (!session()->has('success'))
        <div class=" my-3 text-sm text-red-500 rounded-lg">
            <span class="font-medium">Aucun compte utilise cette adresse e-mail</span>
        </div>
        @endif
      
        <div class="flex items-center mb-5">
            <a href="{{ route('Auth.loginpage') }}" class="hover:bg-gray-300 p-1 rounded-lg text-blue-700">Retour à la page de connexion ?</a>
        </div>

        <div class="text-right">
            <button type="submit" class="text-white font-medium rounded-lg text-sm px-5 py-2.5 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-800">Envoyer le code</button>
        </div>
    </form>
</div>
@endsection