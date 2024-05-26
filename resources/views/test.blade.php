<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navigation -->
    <nav class="bg-white border-gray-200 shadow-md">
        <div class="max-w-screen-xl mx-auto p-4 flex items-center justify-between">
            <span class="text-2xl font-bold text-black">Service gestion des matériels et équipements</span>
            <button data-collapse-toggle="navbar-default" type="button" class="md:hidden inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden md:block w-full md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col md:flex-row md:space-x-8">
                    <li class="m-2">
                        <a href="#" class="flex items-center text-black">
                            <img src="https://super.so/icon/dark/home.svg" class="mx-2" alt="home">
                            <span>Accueil</span>
                        </a>
                    </li>
                    <li class="m-2">
                        <a href="#" class="flex items-center text-black">
                            <img src="https://super.so/icon/dark/user.svg" class="mx-2" alt="user">
                            <span>Mon Espace</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-4">
        <div class="relative bg-cover bg-center bg-no-repeat  rounded-lg shadow-md p-6" style="background-image: url('{{ asset('assets/images/Agadir_Areal_view_cropped.jpg') }}');">
           <div class="flex items-center justify-center">
            <div class="rounded-lg bg-white p-4  max-w-full h-auto">
                <img src="{{ asset('assets/images/Logo_Agadir.jpg') }}" alt="logo" class="max-w-full h-auto">
            </div>
           </div>
        </div>

        <br/>
        <!-- Features Section -->
        <section class="mt-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Nos fonctionnalités</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Gestion de matériel</h3>
                    <p class="text-gray-600">Suivez et gérez l'inventaire de votre matériel facilement.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Suivi des réparations</h3>
                    <p class="text-gray-600">Gardez une trace des réparations et des maintenances.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Rapports détaillés</h3>
                    <p class="text-gray-600">Générez des rapports détaillés pour une meilleure analyse.</p>
                </div>
            </div>
        </section>
    </main>


