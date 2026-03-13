<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ShopSeeder extends Seeder
{
    public function run(): void
    {

        // ELEKTRONIKA
        $electronics = Category::create([
            'name' => 'Elektronika',
            'slug' => 'elektronika'
        ]);

        Product::create([
            'name'=>'Smartfon X200',
            'slug'=>'smartfon-x200',
            'description'=>'Nowoczesny smartfon z szybkim procesorem.',
            'sku'=>'ELE001',
            'price_net'=>1600,
            'price_gross'=>1999,
            'vat_rate'=>23,
            'stock'=>20,
            'status'=>'published',
            'category_id'=>$electronics->id
        ]);

        Product::create([
            'name'=>'Laptop ProBook',
            'slug'=>'laptop-probook',
            'description'=>'Laptop idealny do pracy i nauki.',
            'sku'=>'ELE002',
            'price_net'=>3200,
            'price_gross'=>3999,
            'vat_rate'=>23,
            'stock'=>10,
            'status'=>'published',
            'category_id'=>$electronics->id
        ]);

        Product::create([
            'name'=>'Słuchawki Bluetooth',
            'slug'=>'sluchawki-bluetooth',
            'description'=>'Bezprzewodowe słuchawki z redukcją szumów.',
            'sku'=>'ELE003',
            'price_net'=>240,
            'price_gross'=>299,
            'vat_rate'=>23,
            'stock'=>30,
            'status'=>'published',
            'category_id'=>$electronics->id
        ]);

        Product::create([
            'name'=>'Smartwatch Active',
            'slug'=>'smartwatch-active',
            'description'=>'Zegarek sportowy z GPS.',
            'sku'=>'ELE004',
            'price_net'=>560,
            'price_gross'=>699,
            'vat_rate'=>23,
            'stock'=>15,
            'status'=>'published',
            'category_id'=>$electronics->id
        ]);

        Product::create([
            'name'=>'Tablet Air',
            'slug'=>'tablet-air',
            'description'=>'Lekki tablet do multimediów.',
            'sku'=>'ELE005',
            'price_net'=>1040,
            'price_gross'=>1299,
            'vat_rate'=>23,
            'stock'=>12,
            'status'=>'published',
            'category_id'=>$electronics->id
        ]);

        Product::create([
            'name'=>'Głośnik Bluetooth',
            'slug'=>'glosnik-bluetooth',
            'description'=>'Przenośny głośnik o mocnym basie.',
            'sku'=>'ELE006',
            'price_net'=>200,
            'price_gross'=>249,
            'vat_rate'=>23,
            'stock'=>25,
            'status'=>'published',
            'category_id'=>$electronics->id
        ]);


        // UBRANIA
        $clothes = Category::create([
            'name'=>'Ubrania',
            'slug'=>'ubrania'
        ]);

        Product::create([
            'name'=>'Koszulka Basic',
            'slug'=>'koszulka-basic',
            'description'=>'Bawełniana koszulka codzienna.',
            'sku'=>'UBR001',
            'price_net'=>40,
            'price_gross'=>49,
            'vat_rate'=>23,
            'stock'=>50,
            'status'=>'published',
            'category_id'=>$clothes->id
        ]);

        Product::create([
            'name'=>'Bluza Hoodie',
            'slug'=>'bluza-hoodie',
            'description'=>'Ciepła bluza z kapturem.',
            'sku'=>'UBR002',
            'price_net'=>120,
            'price_gross'=>149,
            'vat_rate'=>23,
            'stock'=>35,
            'status'=>'published',
            'category_id'=>$clothes->id
        ]);

        Product::create([
            'name'=>'Spodnie Jeans',
            'slug'=>'spodnie-jeans',
            'description'=>'Klasyczne jeansy męskie.',
            'sku'=>'UBR003',
            'price_net'=>160,
            'price_gross'=>199,
            'vat_rate'=>23,
            'stock'=>25,
            'status'=>'published',
            'category_id'=>$clothes->id
        ]);

        Product::create([
            'name'=>'Kurtka zimowa',
            'slug'=>'kurtka-zimowa',
            'description'=>'Ciepła kurtka na zimę.',
            'sku'=>'UBR004',
            'price_net'=>320,
            'price_gross'=>399,
            'vat_rate'=>23,
            'stock'=>15,
            'status'=>'published',
            'category_id'=>$clothes->id
        ]);

        Product::create([
            'name'=>'Czapka zimowa',
            'slug'=>'czapka-zimowa',
            'description'=>'Stylowa czapka na zimę.',
            'sku'=>'UBR005',
            'price_net'=>48,
            'price_gross'=>59,
            'vat_rate'=>23,
            'stock'=>40,
            'status'=>'published',
            'category_id'=>$clothes->id
        ]);

        Product::create([
            'name'=>'Buty sportowe',
            'slug'=>'buty-sportowe',
            'description'=>'Lekkie buty do biegania.',
            'sku'=>'UBR006',
            'price_net'=>240,
            'price_gross'=>299,
            'vat_rate'=>23,
            'stock'=>20,
            'status'=>'published',
            'category_id'=>$clothes->id
        ]);


        // AKCESORIA
        $accessories = Category::create([
            'name'=>'Akcesoria',
            'slug'=>'akcesoria'
        ]);

        Product::create([
            'name'=>'Plecak miejski',
            'slug'=>'plecak-miejski',
            'description'=>'Plecak idealny do pracy i szkoły.',
            'sku'=>'AKC001',
            'price_net'=>120,
            'price_gross'=>149,
            'vat_rate'=>23,
            'stock'=>20,
            'status'=>'published',
            'category_id'=>$accessories->id
        ]);

        Product::create([
            'name'=>'Portfel skórzany',
            'slug'=>'portfel-skorzany',
            'description'=>'Elegancki portfel ze skóry.',
            'sku'=>'AKC002',
            'price_net'=>80,
            'price_gross'=>99,
            'vat_rate'=>23,
            'stock'=>25,
            'status'=>'published',
            'category_id'=>$accessories->id
        ]);

        Product::create([
            'name'=>'Okulary przeciwsłoneczne',
            'slug'=>'okulary-przeciwsloneczne',
            'description'=>'Stylowe okulary UV.',
            'sku'=>'AKC003',
            'price_net'=>72,
            'price_gross'=>89,
            'vat_rate'=>23,
            'stock'=>30,
            'status'=>'published',
            'category_id'=>$accessories->id
        ]);

        Product::create([
            'name'=>'Zegarek klasyczny',
            'slug'=>'zegarek-klasyczny',
            'description'=>'Elegancki zegarek na rękę.',
            'sku'=>'AKC004',
            'price_net'=>320,
            'price_gross'=>399,
            'vat_rate'=>23,
            'stock'=>10,
            'status'=>'published',
            'category_id'=>$accessories->id
        ]);

        Product::create([
            'name'=>'Pasek skórzany',
            'slug'=>'pasek-skorzany',
            'description'=>'Solidny pasek do spodni.',
            'sku'=>'AKC005',
            'price_net'=>80,
            'price_gross'=>99,
            'vat_rate'=>23,
            'stock'=>20,
            'status'=>'published',
            'category_id'=>$accessories->id
        ]);

        Product::create([
            'name'=>'Torba podróżna',
            'slug'=>'torba-podrozna',
            'description'=>'Duża torba na wyjazdy.',
            'sku'=>'AKC006',
            'price_net'=>200,
            'price_gross'=>249,
            'vat_rate'=>23,
            'stock'=>12,
            'status'=>'published',
            'category_id'=>$accessories->id
        ]);

    }
}