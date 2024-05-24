@extends('Auth.templateAu')



@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-300">
   

    <div class="flex flex-col items-center justify-center max-w-sm w-full p-6 bg-white rounded-lg shadow-md ">
    <svg xmlns="http://www.w3.org/2000/svg" class="m-5" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q54 0 104-17.5t92-50.5L228-676q-33 42-50.5 92T160-480q0 134 93 227t227 93Zm252-124q33-42 50.5-92T800-480q0-134-93-227t-227-93q-54 0-104 17.5T284-732l448 448Z"/></svg>
    <span class="mt-5 text-medium text-3xl text-red-500">Vous n'avez pas accès à </span>
    <span class=" mb-5 text-medium text-3xl text-red-500">cette page </span>
    </div> 


</div>
@endsection