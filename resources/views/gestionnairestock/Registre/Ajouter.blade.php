@extends('gestionnairestock.templateGS')

@section('title')
Affectation materiel ou équipement :
@endsection

@section('content')
<div class="flex flex-col bg-gray-300 ">


    <div class="flex flex-col mx-auto px-5 ">
        <form action="{{ route('Registre.refer') }}" method="post" class="">
            @csrf

            
            <div class=" my-3">
                <div class="relative   sm:rounded-lg">
                    <table class=" overflow-x-scroll text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-400 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nom
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prenom
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Division
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Service
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
    
                            <tr class="bg-gray-100 border-gray-600 hover:bg-gray-200">
    
    
                                <td class="px-6 py-4 text-black">
                                    {{ $item->nom}}
                                </td>
                                <td class="px-6 py-4 text-black">
                                    {{ $item->prenom}}
                                </td>
                                <td class="px-6 py-4 text-black">
                                    {{ $item->division}}
                                </td>
                                <td class="px-6 py-4 text-black">
                                    {{ $item->service}}
                                </td>
                               
                                <td class="px-6 py-4 ">
                                    
                                    <input  type="radio" value="{{$item->id}}" name="users_id" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">

                                </td>
    
    
                            </tr>
    
                           
       
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
                <!--pagination-->
                <div class="m-4">
                    {{ $users->links() }}
                </div>
            </div>


           
            





            <div class=" mt-4 "> 
                <input value="{{$materiels_id}}"  type="number" class="hidden"  name="materiels_id"/> 
            </div>


            <div class=" mt-4 "> 
                <label class="font-medium text-black uppercase ">Etat de materiel : </label> 
            <select  name="etats_id" class="w-full  rounded-lg p-1 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700">
                <option  value="" selected></option>
                @foreach ($etats as $item) 
                <option  value="{{$item->id}}" >{{$item->nom}}</option>
                @endforeach
              </select>  
              @error('etats_id')
              <span  class="text-red-600">{{ $message }}</span>
               @enderror
            </div>
            

            <div  class="mt-2"> 
                <label class="font-medium text-black uppercase ">Lieu de materiel ou Fonctionaire :  </label>  
                <input value="" type="text" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700"  name="lieu"/> 
                @error('lieu')
                <span  class="text-red-600">{{ $message }}</span>
                 @enderror
              
            </div>
                        
                <div class=" mt-2 "> 
                <label class="font-medium text-black uppercase">Date de effectation : </label> 
                <input type="date" value="" id="date" name="date" class="w-full rounded-lg p-3 h-10 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" />
                @error('date')
                <span  class="text-red-600">{{ $message }}</span>
                 @enderror
                <div>
           
                <div class=" flex flex-col mt-2 "> 
                       <label class="font-medium text-black uppercase mt-2">Rapport : </label> 
                       <textarea  class="w-full rounded-lg p-3 h-40 m-2 bg-white border-gray-600 placeholder-gray-700 text-gray-700" name="rapport"></textarea>
                       @error('rapport')
                       <span  class="text-red-600">{{ $message }}</span>
                        @enderror
                <div>
           
           
           
           
           <div class="flex content-center justify-center m-4">
            <button  class="mr-10 text-white font-medium rounded-lg text-sm h-9  p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                Oui , Affecté</button>
        </form>
        <a href="{{route('GestionnairesStock.index')}}" class="text-white font-medium rounded-lg  text-sm h-9 p-2 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
            No, Affecté</a>
        </div>
    </div>






</div>    


@endsection