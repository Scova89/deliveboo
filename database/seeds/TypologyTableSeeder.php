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
                'image' => 'uploads/LzGvThgTS6SWfEwidqneZ9QqehWCW2Nzlc3jddbW.jpg',
            ],
            [
                'name' => 'cinese',
                'image' => 'uploads/gE1sWsFHWQ4wT8xx4cQEsQLXKu6wjXgdmHTfrLyW.jpg',
            ],
            [
                'name' => 'giapponese',
                'image' => 'uploads/Ym8YlnCoVzRwhhENY3Eqa1WEIQSJlCUyQ3fdMNKj.jpg',
            ],
            [
                'name' => 'americano',
                'image' => 'uploads/Hd6OFfqvk3kuUdGiS2lIZCVoZE6alNqSIv13rpEN.jpg',
            ],
            [
                'name' => 'indiano',
                'image' => 'uploads/zGyfa71Z30JWm31bJsHYPFWIwiFFr41qYBYfcZRZ.jpg',
            ],
            [
                'name' => 'messicano',
                'image' => 'uploads/PNTkAZimDEbnO6LncaDhQvUbkJge4cM2YthGCCPS.jpg',
            ],
            [
                'name' => 'pizza',
                'image' => 'uploads/kMlc1pFhqd6mJZH18tjlaiqkjLqSSINJ3KtIldIU.jpg',
            ],
            [
                'name' => 'panini',
                'image' => 'uploads/9JNQlB7jnE9NOE4PBKiHLuAiZD12kGv3K3fULoxs.jpg',
            ],
            [
                'name' => 'piadine',
                'image' => 'uploads/KaSmI8b6bVoEetr502m0mC9sx0drYmp2XYCNomTn.jpg',
            ],
            [
                'name' => 'poke',
                'image' => 'uploads/DWcdeVftbdrZGeXhn3WCQcthOIAJU7CQ8fcTFS9H.webp',
            ],
            [
                'name' => 'burger',
                'image' => 'uploads/CnVXcO8UeBfEYLvUq5ZW9wmtfPWoyLj793Hce6yR.jpg',
            ],
            [
                'name' => 'sushi',
                'image' => 'uploads/3Y1CZmS0yEoyxb5CwdLxfHzrTtEKNsHNU8AVIkvQ.webp',
            ],
            [
                'name' => 'dessert',
                'image' => 'uploads/ScfCmvW0FHPcSQGo6jcqHX0WTmq9dgdN6ca8sgVA.jpg',
            ],
        ];

        foreach ($typologies as $typology) {
            $newTypology = new Typology();
            $newTypology->name = $typology['name'];
            $newTypology->image = $typology['image'];
            $newTypology->slug = Str::of($typology["name"])->slug('-');
            $newTypology->save();
        }
    }
}
