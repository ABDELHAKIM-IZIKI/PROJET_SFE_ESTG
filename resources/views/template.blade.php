<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('titlepage')</title>
</head>
<body>
 <!--button  -->
 <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
   <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>


  <!--sidebar -->
 <aside id="default-sidebar" aria-label="Sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" >
    <div class="flex flex-col h-full px-3 py-4 overflow-y-auto bg-gray-50 bg-white">
      <div class="m-2 text-xl lg:hidden  md:hidden"><button class="float-end" id="buttonx">X</button></div>
      <div class="m-2 mb-5 text-xl text-black font-bold no-italic"><span>Service gestion des  matériels  et équipements</span></div>
       <ul class="space-y-2 font-medium">
          <li>
            <a href="{{route('home')}}" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
                <img src="https://super.so/icon/dark/home.svg"/>
                <span class="ms-3">Accueil</span>
             </a>
          </li>
         @yield('sidebar')
         <li>
           <a href="@yield('LinkLogout')" class="flex items-center p-2 text-gray-900 rounded-lg text-black  hover:bg-gray-100 group">
              <img src="https://super.so/icon/dark/log-out.svg" alt="">
              <span class="flex-1 ms-3 whitespace-nowrap">Déconnecter</span>
           </a>
        </li>
    </div>

    
 </aside>
 








 <div class=" h-screen  flex flex-col sm:ml-64 bg-gray-300">
    
 <!--titre-->
<h1 class="text-4xl m-4 text-black font-bold no-italic ">@yield('title')</h1><br/>





 <!--content-->
@yield('content') 


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