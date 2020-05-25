<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $dataArray = [
            ['ulaskorpe@gmail.com','123123','Ulaş Körpe',1],
            ['serdaraslanturk@gmail.com','123123','Serdar Aslantürk',1],
            ['sametdemir@gmail.com','123123','Samet Demir',1],

        ];

        $i=1;
        foreach($dataArray as $data){
            $admin = new  Admin();
            $admin->email =  $data[0];
            $admin->password = md5($data[1]);
            $admin->name_surname  = $data[2];
            $admin->phone  = $faker->phoneNumber;
            $admin->sudo = $data[3];
            $admin->save();
            $i++;
        }
    }
}
