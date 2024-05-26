@extends('Auth.templateAu')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-300">
   

        <form class="max-w-sm w-full p-6 bg-white rounded-lg shadow-md" action="{{ route('Auth.MDP_change' ) }}" method="POST" >
            @csrf 

           

            <div class="mb-5">
                <input type="hidden" name="email" value="{{  $email }}">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Votre nouveau mot de passe :</label>
                <input type="password" name="password" class="w-full bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" placeholder="*********" required>
                @error('password')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Confirmation Votre nouveau mot de passe :</label>
                <input type="password"  name="Cpassword" class="w-full bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" placeholder="*********" required>
                @error('Cpassword')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            @if (session()->has('error'))
        <div class=" my-4 text-sm text-red-500 rounded-lg">
            <span class="font-medium">{{session('error')}}</span>
        </div>
        @endif


            <div class="text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center">Changer le mot de passe</button>
            </div>

        </form>

 
</div>
@endsection