<?php

namespace Database\Seeders;

use App\Models\Etat;
use App\Models\Materiel;
use App\Models\Registre;
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
      

      //Registre::insert(['users_id'=>17 , 'materiels_id'=>25 ,'etats_id'=> 1 , 'lieu'=>'tilila','date'=>date('Y:m:d'),'QR'=>'test' ]);
         




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
