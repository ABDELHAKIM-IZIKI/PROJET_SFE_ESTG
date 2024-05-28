@extends('template')
@section('titlepage')
Administrateur 
@endsection
@section('sidebar')
<li>
    <a href="{{route('admin.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
       <img src="https://super.so/icon/dark/users.svg" alt="">
       <span class="flex-1 ms-3 whitespace-nowrap">Gérer les utilisateurs</span>
       
    </a>
 </li>
 <!--<li>
    <a href="{{route('role.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
       <img src="https://super.so/icon/dark/briefcase.svg" />
       <span class="flex-1 ms-3 whitespace-nowrap">Gérer les roles</span>
    </a>
 </li>-->
@endsection