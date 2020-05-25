<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        User::create([
//            'name' => 'ulaş körpe',
//            'email' => 'ulaskorpe@gmail.com',
//            'password' => bcrypt('secret'),
//        ]);


        $user = new User();
        $user->name = 'ulaş körpe';
        $user->email = 'ulaskorpe@gmail.com';
        $user->password = bcrypt('secret');

        $user->save();
        $admin = Role::where('name','=','admin')->first();

       // $user->attachRole($admin);
        $user->roles()->attach($admin->id);


    }
}
