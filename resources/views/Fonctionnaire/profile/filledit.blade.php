@extends('Fonctionnaire.templateF')

@section('content')
<div class="bg-gray-300">
<div><h1 class="px-4 pb-6 text-4xl text-black font-bold no-italic ">Mon profile : </h1><br/></div>

<form class="max-w-sm w-full mx-auto p-6 bg-white rounded-lg shadow-md mb-5 p-4" method="POST"  action="{{route('profile.edit')}}">
@csrf
    @if (session()->has('error'))
    <div class=" my-3  p-3 ">
      <span class="font-medium text-red-600">{{  session('error') }} </span>
        </div>
        @endif
    
    @if (session()->has('success'))
    <div class=" my-3  p-3 ">
      <span class="font-medium text-green-600">{{  session('success') }} </span>
        </div>
        @endif


    <div class="mb-5">
        <label  class="block mb-2 text-sm font-medium text-gray-900">Nom :</label>
        <input type="text"  name="nom" value="{{$profile->nom}}" class="w-full bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" required>
        @error('nom')
   <span class="text-red-600">{{ $message }}</span>
   @enderror
    </div>

    <div class="mb-5">
        <label  class="block mb-2 text-sm font-medium text-gray-900">Prenom :</label>
        <input type="text"  name="prenom" value="{{$profile->prenom}}" class="w-full bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" required>
        @error('prenom')
   <span class="text-red-600">{{ $message }}</span>
   @enderror
    </div>

    <div class="mb-5">
        <label  class="block mb-2 text-sm font-medium text-gray-900">Tel :</label>
        <input type="text"  name="tel" value="{{$profile->tel}}" class="w-full bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" required>
        @error('tel')
   <span class="text-red-600">{{ $message }}</span>
   @enderror
    </div>


    <div class="mb-5">
        <label  class="block mb-2 text-sm font-medium text-gray-900">Email :</label>
        <input type="email"  name="email" value="{{$profile->email}}" class="w-full bg-white border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" required>
        @error('email')
   <span class="text-red-600">{{ $message }}</span>
   @enderror
    </div>


    

    <div class="flex justify-end mb-5">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center">Modifier</button>
    </div>

</form>
</div>
@endsection