<?php

namespace Database\Seeders;

use App\Models\Materiel;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      

         Materiel::insert(
            ['nom'=>'TP-Link Routeur ADSL2+ WiFi N300 Mbps',
            'image'=>'assets/imageMateriel/p_1_1_4_4_1144-TP-Link-Routeur-ADSL2-WiFi-N-300-Mbps.jpg',
            'model'=>'TD-W8961N',
              'quantite'=>10 ,
              'date'=>date('Y/m/d')
            ]
        );




            // Role::insert(['nom'=>'Avec no role']);

     /*  User::insert(['roles_id'=>3,
      'nom'=>'lahccen' ,
       'prenom'=>'benlahccen',
       'tel'=>'0666666666',
       'email'=>'test3@gmail.com',
       'password'=>Hash::make('0666557198'),
       'division'=>'',
       'service'=>'']);  */

       
    }
}
