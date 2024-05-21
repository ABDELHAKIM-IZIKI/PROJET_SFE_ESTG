@extends('Fonctionnaire.templateF')

@section('title')
Mon réclamation :
@endsection

@section('content')



<!--successajoute-->
@if (session()->has('success'))
<div class=" mx-4 my-6 text-sm text-green-800 rounded-lg bg-green-100  p-3 items-center z-0">
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif

<div class="mx-4 relative overflow-x-auto z-0">
    <br />
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-400 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom de materiel
                </th>
                <th scope="col" class="px-6 py-3">
                   Model de materiel
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

@if (!$reclamation->isempty())
    

            @foreach ($reclamation as $item)
        
            <tr class="bg-gray-100 border-gray-600 hover:bg-gray-200">


                <td class="px-6 py-4 text-black">
                  {{ $item->registre->materiel->nom }}
                </td>
                <td class="px-6 py-4 text-black">
                    {{ $item->registre->materiel->model}}
                </td>
                <td class="px-6 py-4 text-black">
                    {{ $item->date}}
                </td>
                <td class="px-6 py-4 text-right flex">
                    
                    @if ($item->vue == 1)
                  <span class="p-1 mr-1"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg></span>  
                @endif
                
                @if ($item->vue == 0)
                <span class="p-1 mr-1"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M268-240 42-466l57-56 170 170 56 56-57 56Zm226 0L268-466l56-57 170 170 368-368 56 57-424 424Zm0-226-57-56 198-198 57 56-198 198Z"/></svg></span>  
              @endif
                    
                    <button id="openupdate-{{$item->id}}" class="font-medium text-blue-500 hover:underline p-1 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M458-280q18 0 35.5-4.5T526-298l98 98 56-56-98-98q9-15 13.5-32.5T600-422q0-58-41-98t-99-40q-58 0-99 41t-41 99q0 58 40 99t98 41Zm2-80q-25 0-42.5-17.5T400-420q0-25 17.5-42.5T460-480q25 0 42.5 17.5T520-420q0 25-17.5 42.5T460-360ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z"/></svg>
                     </button>
                 
                     <div id="update-{{$item->id}}" class="text-left drop-shadow-2xl fixed inset-0 z-50 flex items-center justify-center hidden p-10 ">
                        <div class="flex flex-col modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 ">
                            
                            <div class="m-4 flex justify-end">
                                <button id="closeupdate-{{$item->id}}" class="p-1.5 hover:bg-gray-200 rounded-lg">X</button>
                            </div>
                            <div class="flex flex-col mx-5 mb-5">
                                <label class="font-medium text-black uppercase my-2">Votre réclamation :</label>
                                <textarea class="rounded-lg h-60   z-60  bg-gray-100 border-gray-600  text-gray-700  p-2 " readonly>@php echo $item->reclamation."\n \n ,". $item->date @endphp </textarea>
                            </div>
                        </div>
                    </div>
                
                  <form action="{{ route('Fonctionnaire.destroy',[ 'id' => $item->id ] ) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-blue-500 hover:underline p-1  ">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                        </button>
                    </form>

                
                
                
                
                
                </td>


            </tr>

           

            <script>
                var modal{{$item->id}} = document.getElementById("update-{{$item->id}}");
                var btn{{$item->id}} = document.getElementById("openupdate-{{$item->id}}");
                var span{{$item->id}} = document.getElementById("closeupdate-{{$item->id}}");

                 btn{{$item->id}}.onclick = function() {
                 modal{{$item->id}}.classList.remove("hidden");
                 }

                  span{{$item->id}}.onclick = function() {
                  modal{{$item->id}}.classList.add("hidden");
                 }
         </script>

            @endforeach
            @endif


        </tbody>
    </table>

@if ($reclamation->isempty())  

</div>
<div class="bg-gray-100 border-gray-600  mx-4  p-6 grid place-items-center">

 
    <span class="px-6 py-4 text-black text-3xl ">
    Aucune réclamation
    <span class="px-6 py-4 text-black">
 

</div>
@endif
@endsection