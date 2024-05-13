@extends('template')
@section('titlepage')
GestionnaireStock  
@endsection
@section('sidebar')
<li>
    <a href="{{route('GestionnairesStock.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-200h80v-320h480v320h80v-426L480-754 160-626v426Zm-80 80v-560l400-160 400 160v560H640v-320H320v320H80Zm280 0v-80h80v80h-80Zm80-120v-80h80v80h-80Zm80 120v-80h80v80h-80ZM240-520h480-480Z"/></svg>
       <span class="flex-1 ms-3 whitespace-nowrap">Gérer les materiels</span>
       
    </a>
 </li>
 <li>
    <a href="{{route('Registre.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
       <img src="https://super.so/icon/dark/clipboard.svg" alt="">
       <span class="flex-1 ms-3 whitespace-nowrap">Gérer registre</span>
       
    </a>
 </li>
 <li>
    <a href="{{route('Categorie.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
       <img src="https://super.so/icon/dark/list.svg" alt="">
       <span class="flex-1 ms-3 whitespace-nowrap">Gérer les categories</span>
       
    </a>
 </li>
 <li>
    <a href="{{route('Marque.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
       <img src="https://super.so/icon/dark/tag.svg" alt="">
       <span class="flex-1 ms-3 whitespace-nowrap">Gérer les marques</span>
       
    </a>
 </li>
 <li>
    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M80-680v-200h200v80H160v120H80Zm0 600v-200h80v120h120v80H80Zm600 0v-80h120v-120h80v200H680Zm120-600v-120H680v-80h200v200h-80ZM700-260h60v60h-60v-60Zm0-120h60v60h-60v-60Zm-60 60h60v60h-60v-60Zm-60 60h60v60h-60v-60Zm-60-60h60v60h-60v-60Zm120-120h60v60h-60v-60Zm-60 60h60v60h-60v-60Zm-60-60h60v60h-60v-60Zm240-320v240H520v-240h240ZM440-440v240H200v-240h240Zm0-320v240H200v-240h240Zm-60 500v-120H260v120h120Zm0-320v-120H260v120h120Zm320 0v-120H580v120h120Z"/></svg>
       <span class="flex-1 ms-3 whitespace-nowrap">Scanner QRcode</span>
       
    </a>
 </li>
    
@endsection