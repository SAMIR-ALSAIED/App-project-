<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


            $products = [

            [
                'name' => 'Samsung Galaxy A15',
                'price' => 7200,
                'description' => 'موبايل سامسونج A15 بشاشة 6.6 بوصة، كاميرا 50MP، بطارية 5000mAh.',
                'category_id' => 35,
                'image' => 'products/mobile1.png',
            ],
            [
                'name' => 'Samsung Galaxy A25',
                'price' => 8900,
                'description' => 'هاتف Samsung Galaxy A25 بمعالج قوي، شاشة 6.5 بوصة، بطارية تدوم طوال اليوم.',
                'category_id' => 35,
                'image' => 'products/mobile2.png',
            ],
            [
                'name' => 'iPhone 11',
                'price' => 16000,
                'description' => 'هاتف iPhone 11 بشاشة Liquid Retina 6.1 بوصة، كاميرا مزدوجة، أداء ممتاز.',
                'category_id' => 35,
                'image' => 'products/mobile3.png',
            ],
            [
                'name' => 'iPhone 13',
                'price' => 24000,
                'description' => 'iPhone 13 بشريحة A15 Bionic، شاشة Super Retina XDR، كاميرا مزدوجة مذهلة.',
                'category_id' => 35,
                'image' => 'products/mobile4.png',
            ],


            [
                'name' => 'شاحن سامسونج أصلي 25W',
                'price' => 450,
                'description' => 'شاحن سريع أصلي من سامسونج، يوفر شحن آمن وسريع لهاتفك.',
                'category_id' => 36,
                'image' => 'products/charger.png',
            ],
            [
                'name' => 'سماعة بلوتوث JBL GO 3',
                'price' => 1800,
                'description' => 'سماعة محمولة صغيرة الحجم، صوت نقي وقوي، مقاومة للماء.',
                'category_id' => 36,
                'image' => 'products/speaker.png',
            ],
            [
                'name' => 'باور بانك Anker 20000mAh',
                'price' => 2200,
                'description' => 'بطارية متنقلة بسعة كبيرة 20000mAh لشحن جميع أجهزتك بسرعة.',
                'category_id' => 36,
                'image' => 'products/powerbank.png',
            ],

            [
                'name' => 'Dell Latitude 5400',
                'price' => 14500,
                'description' => 'لابتوب Dell Latitude 5400 بأداء قوي، شاشة 14 بوصة، مثالي للشغل والدراسة.',
                'category_id' => 37,
                'image' => 'products/laptop1.png',
            ],
            [
                'name' => 'HP 15s',
                'price' => 17000,
                'description' => 'لابتوب HP 15s بمعالج حديث، رام 8GB، شاشة 15.6 بوصة، مناسب لجميع الاستخدامات.',
                'category_id' => 37,
                'image' => 'products/laptop2.png',
            ],
            [
                'name' => 'Lenovo ThinkPad T480',
                'price' => 15500,
                'description' => 'لابتوب Lenovo ThinkPad T480 بجودة عالية، تصميم متين، وأداء ممتاز للعمل اليومي.',
                'category_id' => 37,
                'image' => 'products/laptop3.png',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }


    }
}
