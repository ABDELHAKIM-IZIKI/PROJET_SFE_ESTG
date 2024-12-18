<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Administrateurs</title>
</head>
<body>
 <!--button-->
 <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>


  <!--sidebar-->
 <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full flex flex-col px-3 py-4 overflow-y-auto bg-gray-50 bg-white">
            <div class="m-2 text-xl lg:hidden  md:hidden"><button class="float-end" id="buttonx">X</button></div>
            <div class="m-2 mb-5 text-xl text-black font-bold no-italic"><span>Service gestion des  matériels  et équipements</span></div>
       <ul class="space-y-2 font-medium">
          <li>
            <a href="{{route('home')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
                <img src="https://super.so/icon/dark/home.svg"/>
                <span class="ms-3">Accueil</span>
             </a>
          </li>
          <li>
            <a href="{{route('contact')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
               <img src="https://super.so/icon/dark/help-circle.svg"/>
               <span class="flex-1 ms-3 whitespace-nowrap">Contact</span>
            </a>
         </li>
         <li>
            <a href="{{route('admin.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
               <img src="https://super.so/icon/dark/users.svg" alt="">
               <span class="flex-1 ms-3 whitespace-nowrap">Gérer les utilisateurs</span>
               
            </a>
         </li>
         <li>
            <a href="{{route('role.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
               <img src="https://super.so/icon/dark/briefcase.svg" />
               <span class="flex-1 ms-3 whitespace-nowrap">Gérer les roles</span>
            </a>
         </li>
         <li>
           <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
              <img src="https://super.so/icon/dark/log-out.svg" alt="">
              <span class="flex-1 ms-3 whitespace-nowrap">Déconnecter</span>
           </a>
        </li>
    </div>
 </aside>
 








 <div class="p-4 h-screen flex flex-col sm:ml-64 bg-gray-300">
 <!--titre-->
  <div><h1 class="text-4xl text-black font-bold no-italic">Les roles : </h1><br/></div>



 <!--searchbar-->
  <div class="mx-2">
    <form method="get" action="{{route('role.search')}}" class="flex m-6 items-center">   
    @csrf
    <div class="relative flex ">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        </div>
        <input type="text" name="nom" class="rounded-lg p-3 h-10  mx-2 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="nom"  />

    
    <button type="submit" class=" p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
        <span class="sr-only">Recherche</span>
    </button>
    </form></div>
 </div>



 <br/>
 <!--ajoutebuttom-->
 <div class="flex flex-row-reverse">
     <a href="{{route('role.fill')}}" class=" rounded-lg  h-10 px-4 py-2 w-25 mx-2 bg-blue-600 hover:bg-blue-700  text-white  ">Ajouter un nouveau role</a>
 </div>



<!--table-->
<div>
<div class="relative overflow-x-auto  sm:rounded-lg">
    <br/>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                  Nom de Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                  </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $item)
           
            <tr class=" bg-gray-700  border-gray-600  hover:bg-gray-600">


                <td class="px-6 py-4 text-white">
                   {{ $item->id}}
                </td>
                <td class="px-6 py-4 text-white">
                    {{ $item->nom}}
                </td>
                <td class="px-6 py-4 text-right flex">
                    <a href="{{route('role.filledit', [ 'id' => $item->id ])}}" class="font-medium  text-blue-500 hover:underline pr-2">Modifié</a>
                    <form action="{{ route('role.destroy',[ 'id' => $item->id ] ) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-blue-500 hover:underline pr-2">supprimé</button>
                      </form>
                    
                </td>
           

              </tr>
            
      
             @endforeach
           
        </tbody>
    </table>
</div>
<!--pagination-->
<div class="m-4">
    {{ $roles->links() }}
    </div>
</div>




 <script>

document.getElementById('buttonx').addEventListener('click',function(){ document.getElementById('default-sidebar').classList.toggle('hidden'); });

        document.querySelector('[data-drawer-toggle="default-sidebar"]').addEventListener('click', function() {
   document.getElementById('default-sidebar').classList.toggle('-translate-x-full');

   document.querySelector('[data-drawer-target="default-sidebar"]').addEventListener('click', function() {
   document.getElementById('default-sidebar').classList.toggle('hidden');
});
});
</script>
    
</body>
</html>