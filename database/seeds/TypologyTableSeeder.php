<?php

use App\Typology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies = [
            [
                'name' => 'italiano',
                'image' => 'https://leonardo.it/wp-content/uploads/2021/01/SH_cucina_italiana.jpg',
            ],
            [
                'name' => 'cinese',
                'image' => 'https://www.buttalapasta.it/wp-content/uploads/2011/01/cucina-cinese-piatti-tipici-e-specialita.jpg',
            ],
            [
                'name' => 'giapponese',
                'image' => 'https://images.foody.vn/res/g71/709869/s/foody-akira-sushi-709869-440-636494303593026705.jpg',
            ],
            [
                'name' => 'americano',
                'image' => 'https://file.cure-naturali.it/site/image/hotspot_article_first/33222.jpg',
            ],
            [
                'name' => 'indiano',
                'image' => 'https://mangiarebene.s3.amazonaws.com/uploads/blog_item/image/1285/mb_asset.jpg',
            ],
            [
                'name' => 'messicano',
                'image' => 'https://www.viaggiaregratis.eu/wp-content/uploads/2020/11/Cucina-Messicana.jpg',
            ],
            [
                'name' => 'pizza',
                'image' => 'https://latteriasorrentina.com/wp-content/uploads/2019/06/come-fare-la-vera-pizza-1765x882.jpg',
            ],
            [
                'name' => 'panini',
                'image' => 'https://www.corriere.it/methode_image/2021/07/20/Cucina/Foto%20Cucina%20-%20Trattate/pescaria2-cf-cropped-0-440-2048-1545-kVoD-U32802288308258mE-593x443@Corriere-Web-Sezioni.jpeg',
            ],
            [
                'name' => 'piadine',
                'image' => 'https://piper.pizza/wp-content/uploads/2020/04/SH_piadina.jpg',
            ],
            [
                'name' => 'poke',
                'image' => 'https://blog.giallozafferano.it/unacamerieraincucina2701/wp-content/uploads/2019/02/Poke-bowl-con-tonno.jpg',
            ],
            [
                'name' => 'burger',
                'image' => 'https://media.istockphoto.com/photos/homemade-cheese-smash-burger-picture-id618630648?k=20&m=618630648&s=612x612&w=0&h=g04p1-NSXvwS52y74cDgF483LkRpzyoOSwCaduo0mgA=',
            ],
            [
                'name' => 'sushi',
                'image' => 'https://www.melarossa.it/wp-content/uploads/2019/10/cibo-giapponese-menu-ideale-1024x683.jpg.webp?x75642',
            ],
            [
                'name' => 'dessert',
                'image' => 'https://images-gmi-pmc.edge-generalmills.com/7c1096c7-bfd0-4806-a794-1d3001fe0063.jpg',
            ],
        ];

        foreach($typologies as $typology){
            $newTypology = new Typology();
            $newTypology->name = $typology['name'];
            $newTypology->image = $typology['image'];
            $newTypology->slug = Str::of($typology["name"])->slug('-');
            $newTypology->save();
        }
    }
}
