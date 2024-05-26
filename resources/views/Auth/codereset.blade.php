@extends('Auth.templateAu')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-300 p-10">
   

        <form class="max-w-sm w-full p-6 bg-white rounded-lg shadow-md" action="{{ route('Auth.MDP_change_page' ) }}" method="post" >
            @csrf 

            <div class="block mb-10 text-sm font-medium text-gray-900">
            <span>Saisissez le numéro de 6 chiffres que vous avez reçu par email </span>   
            </div>

            <div class="mb-10">
                <input type="hidden" name="email" value="{{ $email }}">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Code : </label>
                <input type="number" id="email" name="code" class="w-full bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" placeholder="123456" required>
                @error('code')
                <span class="text-red-600">{{ $message }}</span>    
                @enderror
            </div>

                @if (session()->has('success'))
                <div class=" my-3  p-3 ">
                <span class="font-medium text-red-600">* {{  session('success') }} *</span>
                </div>
                @endif

            <div class="text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center">Confirmer</button>
            </div>

        </form>

 
</div>
@endsection
