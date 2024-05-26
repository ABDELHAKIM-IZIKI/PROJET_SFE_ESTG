<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se connecter</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<nav class="bg-white border-gray-200 ">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    
    <span class="flex-1 no-italic text-black  lg:text-xl text-sm font-bold no-italic ">Service gestion des  matériels  et équipements</span>


    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto " id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white ">
        <ul class="flex flex-col lg:flex-row  text-black no-italic">
          <li class="m-2 hover:bg-gray-200  rounded-lg p-2">
            <a href="{{route('home')}}" class="flex"><img src="https://super.so/icon/dark/home.svg" class="mx-2" ><span>Accueil</span></a>
          </li>
          <li class="m-2 hover:bg-gray-200  rounded-lg p-2">  
            <a href="{{route('Auth.loginpage')}}" class="flex"> <img src="https://super.so/icon/dark/user.svg" class="mx-2" alt="user"><span>Mon Espace</span></a>
          </li>
        </ul>
      </ul>
    </div>
  </div>
  <script>
    document.querySelector('[data-collapse-toggle]').addEventListener('click', function() {
        var navbar = document.getElementById('navbar-default');
        if (navbar.classList.contains('hidden')) {
            navbar.classList.remove('hidden');
        } else {
            navbar.classList.add('hidden');
        }
    });
</script>
</nav>

<div class=" h-screen  bg-gray-200 flex flex-col ">

@yield('content')

</div>

</body>
</html>