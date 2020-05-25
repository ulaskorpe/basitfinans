<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
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

          ['Dövme\'nin Tarihi','','tattoo',1],
          ['Dövme Bakımı','','tattoo',2],
          ['Dövme Hakkında Sıkça Sorulan Sorular','Merak Ettikleriniz','tattoo',3],
            ['Resim Tasarım','','app',1],
            ['Piercing','','app',2],
            ['Kalıcı Makyaj','','app',3],
            ['Eğitim','','app',4],
            ['Time Out Dergisi Röportajı','','about',1],
            ['kariyer.net Ropörtajı','','about',2],
            ['Dövme Sanatı Dergisi Röportajı','','about',3],
            ['Çekmeköy Life Dergisi Röportajı','','about',4],
            ['Vecdi Çıracıoğlu yazısı','','about',5],
            ['Ekşi Sözlük yorumları','','about',6],

        ];

        $i=1;
        foreach($dataArray as $data){
        $article = new \App\Article();
        $article->title = $data[0];
        $article->menu_title = (!empty($data[1])) ? $data[1] : $data[0] ;
        $article->content = $faker->paragraph(rand(5,15)) ;
        $article->type= $data[2];
        $article->language='tr';
        $article->order = $data[3];
        $article->save();
        $i++;
        }
    }
}
