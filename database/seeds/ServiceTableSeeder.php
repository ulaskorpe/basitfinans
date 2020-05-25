<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $array = [
        ['Dövme','Dövme çok eski zamanlardan beri kendini ifade etme sanatı olarak kullanılır. Çoğu zaman karşımıza bir harf bir sembol veya bir isim olarak çıkar.'
        ,'img/tattoo_1.png','img/tattoo_2.png',1,1],
        ['Piercing','Piercing bir takı türüdür. Cildin ve altındaki yağ tabakasının/kıkırdağın delinmesi ve takı ya da iğne takılması usulü ile gerçekleştirilen vücut süsleme sanatıdır. Piercing çoğunlukla kişisel bir kendini ifade yöntemi olarak kullanılır.'
        ,'img/piercing_1.png','img/piercing_2.png',2,1],
          ['Kalıcı Makyaj','Kalıcı makyaj uygulaması göze, kaşa, dudağa kalıcı olarak kalıcı makyaj cihazı ve kalıcı makyaj boyaları ile kalıcı makyaj (micro) iğneler yardımıyla Epidermis tabakasına çok hassas bir şekilde mikro pigmen uygulanmasıdır.'
              ,'img/makyaj_1.png','img/makyaj_2.png',3,1]
      ];

      foreach ($array as $data){
          $service  = new \App\Service();
          $service->title = $data[0];
          $service->plot = $data[1];
          $service->image = $data[2];
          $service->image_over = $data[3];
          $service->order = $data[4];
          $service->show = $data[5];
          $service->save();

      }


    }
}
