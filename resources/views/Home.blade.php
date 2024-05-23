<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MonSite</title>
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
                <a href="{{route('Auth.login')}}" class="flex"> <img src="https://super.so/icon/dark/user.svg" class="mx-2" alt="user"><span>Mon Espace</span></a>
              </li>
            </ul>

          </div>
        </div>
    </nav>




<main class="h-screen">
    <div class="flex flex-col  bg-gray-200 p-10">
        
        <div class="flex flex-col items-center justify-center">
            <img src="https://super.so/icon/dark/thumbs-up.svg" alt="check-circle" class=" h-10 w-10">
            <p class="p-10 text-center text-2xl items-center justify-center sm:text-m">Découvrez notre site web de gestion des matériels et équipements pour une allocation efficace et un suivi des ressources. Simplifiez vos opérations avec nos fonctionnalités.</p>
        </div>
      </div>

    <div class="flex items-center justify-center " >
       
      <div class="no-italic lg:text-2xl sm:text-m">
        <h1 class="flex ">Bénéfice :</h1>
       <br/>
        <ul>
          <li>- Gestion de stock</li>
          <li>- Localisation rapide des équipements</li>
          <li>- Suivi des mouvements et des besoins en maintenance</li>
          <li>- Gagner du temps</li>
        </ul>

       </div>
        <div class="flex flex-col items-center justify-center bg-white p-20">
            <img src="{{ asset('assets\images\12084832_20943993.jpg') }}" alt="12084832_20943993" class="h-60 ">
        </div>
      </div>
    </main> 
</body>