@extends('template')
@section('titlepage')
Maintenancier 
@endsection
@section('sidebar')

 <li>
    <a href="{{route('Maintenancier.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-120H640q-30 38-71.5 59T480-240q-47 0-88.5-21T320-320H200v120Zm280-120q38 0 69-22t43-58h168v-360H200v360h168q12 36 43 58t69 22ZM200-200h560-560Z"/></svg>
        <span class="flex-1 ms-3 whitespace-nowrap">Ma Boîte de réception </span>
       
    </a>
 </li>
    
@endsection