<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se connecter</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="flex flex-row p-4   ">
        
        <span class="flex-1 no-italic text-black  text-2xl font-bold no-italic ">Service gestion des  matériels  et équipements</span>

            <ul class="flex text-black no-italic">
              <li class="m-2">
                <a href="{{route('home')}}" class="flex"><img src="https://super.so/icon/dark/home.svg" class="mx-2" ><span>Accueil</span></a>
              </li>
              <li class="m-2">  
                <a href="{{route('Auth.loginpage')}}" class="flex"> <img src="https://super.so/icon/dark/user.svg" class="mx-2" alt="user"><span>Mon Espace</span></a>
              </li>
            </ul>

          </div>
        </div>
</nav>

<div class=" h-screen  bg-gray-200 flex flex-col ">

@yield('content')

</div>

</body>
</html>