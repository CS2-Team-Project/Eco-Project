<?php

namespace Database\Seeders;
use App\Models\Product;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Canada Goose Bomber',
                'category' => 'bombers',
                'description' => 'Chilliwack Bomber Heritage',
                'price' => 1375,
                'stock' => 10,
                'details' => json_encode([
                    'Bomber length for exceptional mobility',
                    'Removable fur ruff',
                    'Non-removable, adjustable tunnel hood with a shaping wire to stand up to winds',
                    'Stretch rib waistband and cuff for added warmth and comfort',
                    'Reinforced elbows for durability',
                    'Interior pocket: drop-in pocket'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product1grey.png'
            ],
            [
                'name' => 'Moncler Jacket',
                'category' => 'jackets',
                'description' => 'Moncler New Maya Down Jacket',
                'price' => 765,
                'stock' => 15,
                'details' => json_encode([
                    'Crafted from nylon laqué',
                    'Down-filled with boudin quilting',
                    'Two-way zip closure',
                    'Zipped pockets',
                    'Adjustable, elastic cuffs with snap buttons',
                    'Hem with drawstring fastening',
                    'Flap patch pocket on sleeve',
                    'Felt logo patch on sleeve'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product2black.png'
            ],
            [
                'name' => 'The North Face Puffer',
                'category' => 'puffers',
                'description' => 'North Face 1996 Retro Nuptse',
                'price' => 315,
                'stock' => 20,
                'details' => json_encode([
                    'Fabric - Body: 100% Recycled Nylon Ripstop',
                    'Non-PFC Durable Water-Repellent (DWR) Finish',
                    'Insulation: 700-Fill Goose Down'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product3cream.png'
            ],
            [
                'name' => 'Alpha Industries Bomber Jacket',
                'category' => 'bombers',
                'description' => 'CWU-45 Heritage Bomber Jacket',
                'price' => 200,
                'stock' => 12,
                'details' => json_encode([
                    'Shell: 100% Nylon',
                    'Lining: 100% Nylon',
                    'Filling: 100% Polyester'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product4.png'
            ],
            [
                'name' => 'Uniqlo Down Jacket',
                'category' => 'jackets',
                'description' => 'Seamless Down Jacket',
                'price' => 110,
                'stock' => 18,
                'details' => json_encode([
                    'Made with warm premium down with a fill power of 750',
                    'Water-repellent finish',
                    'Shell: 100% Polyester',
                    'Filling: 90% Down, 10% Feathers'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product5.png'
            ],
            [
                'name' => 'Zavetti Puffer',
                'category' => 'puffers',
                'description' => 'Zavetti Canada Atlin Puffer Jacket',
                'price' => 90,
                'stock' => 14,
                'details' => json_encode([
                    'Main: 100% Polyamide. Lining: 100% Polyester.',
                    'Finished reflective zippered pockets',
                    'Machine washable'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product6.png'
            ],
            [
                'name' => 'Columbia Sports Jacket',
                'category' => 'jackets',
                'description' => 'Powder Lite™ II Insulated Jacket',
                'price' => 125,
                'stock' => 10,
                'details' => json_encode([
                    'Omni-Heat™ thermal reflective',
                    'Water resistant fabric',
                    'Zippered hand pockets',
                    'Uses: Hiking, Walking, Casual'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product7.png'
            ],
            [
                'name' => 'Zara Jacket',
                'category' => 'jackets',
                'description' => 'Lightweight Casual Jacket',
                'price' => 185,
                'stock' => 20,
                'details' => json_encode([
                    'Lightweight jacket made of technical fabric.',
                    'Ribbed collar and long sleeves.',
                    'Welt pockets at the hip. Inside pocket detail.',
                    'BASE FABRIC: 100% polyester'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product8.png'
            ],
            [
                'name' => 'Mercier Puffer Coat',
                'category' => 'puffers',
                'description' => 'Mercier Blizzard Coat',
                'price' => 140,
                'stock' => 17,
                'details' => json_encode([
                    '100% Polyester',
                    'Combat the elements with this men\'s Blizzard Jacket',
                    'Features a full-zip fastening and hood for custom coverage',
                    'Machine washable'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product9.png'
            ],
            [
                'name' => 'All Saints Leather Jacket',
                'category' => 'leathers',
                'description' => 'Milo Desserto® Biker Jacket',
                'price' => 490,
                'stock' => 8,
                'details' => json_encode([
                    'Asymmetric zip front',
                    'Two lower zip pockets',
                    'Ticket pocket',
                    'Hem loops'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product10.png'
            ],
        [
                'name' => 'Evisu Denim Jacket',
                'category' => 'denims',
                'description' => 'Graffiti Prints Regular Fit Denim Jacket',
                'price' => 440,
                'stock' => 15,
                'details' => json_encode([
                    '100% Cotton',
                    'Graffiti styles print logo, Godhead and Daruma',
                    'Button fastening, 4 pockets',
                    'EVISU Premium Quality Kamon tag'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product11.png'
            ],
            [
                'name' => 'Hugo Boss Leather Jacket',
                'category' => 'leathers',
                'description' => 'Porsche x BOSS regular-fit jacket in leather',
                'price' => 1190,
                'stock' => 10,
                'details' => json_encode([
                    'Fastening top: Zip closure',
                    'Pockets top: Zip pockets',
                    'Fully lined',
                    'Standard length'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product12.png'
            ],
            [
                'name' => 'The Leather Company Leather Jacket',
                'category' => 'leathers',
                'description' => 'Mens Safari Style Leather Jacket Black: AMJ-5',
                'price' => 250,
                'stock' => 12,
                'details' => json_encode([
                    'Ashwood Leather Jackets',
                    '100% genuine leather',
                    'Two side and two breast pockets',
                    'Fully lined with two internal pockets'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product13.png'
            ],
            [
                'name' => 'Ralph Lauren Leather Jacket',
                'category' => 'leathers',
                'description' => 'Slim Fit Leather Moto Jacket',
                'price' => 1660,
                'stock' => 8,
                'details' => json_encode([
                    'Slim fit. Hits at the waist',
                    'Left chest zip pocket. Two front waist zip pockets',
                    'Shell and lining: 100% leather. Lining: 57% cupro, 43% cotton',
                    'Dry clean by a leather specialist'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product14.png'
            ],
            [
                'name' => 'Schott NYC Leather Jacket',
                'category' => 'leathers',
                'description' => 'Waxed Natural Pebbled Cowhide Café Leather Jacket',
                'price' => 990,
                'stock' => 10,
                'details' => json_encode([
                    'Full Aniline, drum dyed, hand cut, drummed cowhide leather',
                    'Durable nickel plated brass hardware',
                    'Vintage style open zippered sleeve cuffs with wind flaps',
                    '100% cotton plaid lining'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product15.png'
            ],
            [
                'name' => 'Diesel Denim Jacket',
                'category' => 'denims',
                'description' => 'D-BARCY-S3',
                'price' => 540,
                'stock' => 15,
                'details' => json_encode([
                    'Composition: 100% Cotton, Application 100% Cotton',
                    'Regular fit',
                    '4 pockets',
                    'Button cuffs and waist adjusters'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product16.png'
            ],
            [
                'name' => 'YSL Denim Jacket',
                'category' => 'denims',
                'description' => 'Oversized Jacket in Dark Blue Black Denim',
                'price' => 1110,
                'stock' => 5,
                'details' => json_encode([
                    '100% Cotton',
                    'Made in Italy',
                    'One-button cuffs',
                    'Front button closure'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product17.png'
            ],
            [
                'name' => 'Louis Vuitton Denim Jacket',
                'category' => 'denims',
                'description' => 'DNA Denim Jacket',
                'price' => 1530,
                'stock' => 6,
                'details' => json_encode([
                    '100% cotton Lining: 100% cotton',
                    'Made in Japan',
                    'Regular fit',
                    'Black'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product18.png'
            ],
         [
                'name' => 'Ralph Lauren Denim Jacket',
                'category' => 'denims',
                'description' => 'The Bayport Indigo-Dyed Denim Jacket',
                'price' => 270,
                'stock' => 10,
                'details' => json_encode([
                    '100% cotton. Machine washable. Imported.',
                    'Dyed with indigo',
                    'Straight collar. Throat tab with a snapped closure.'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product19.png'
            ],
            [
                'name' => 'Canada Goose Puffer',
                'category' => 'puffers',
                'description' => 'Crofton Hoody Puffer Jacket',
                'price' => 880,
                'stock' => 12,
                'details' => json_encode([
                    '100% Recycled Nylon',
                    '750 Fill Power Responsibly Sourced Down',
                    'Lightweight, Water-Repellent, Wind-Resistant & Durable'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product20.png'
            ],
            [
                'name' => 'Stone Island Ghost Puffer',
                'category' => 'puffers',
                'description' => 'Ghost Down Puffer Jacket',
                'price' => 1040,
                'stock' => 8,
                'details' => json_encode([
                    'Fabric: Nylon',
                    'Outer: polyamide. Filling: down, feather',
                    'Quilted padded design exudes comfort and warmth'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product21.png'
            ],
            [
                'name' => 'Versace Couture Bomber',
                'category' => 'bombers',
                'description' => 'V-Emblem Bomber Jacket',
                'price' => 570,
                'stock' => 7,
                'details' => json_encode([
                    'Embroidered logo at the chest',
                    'Black glossy finish',
                    'Two press-stud fastening side pockets'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product22.png'
            ],
            [
                'name' => 'Jeff Hamilton Bomber',
                'category' => 'bombers',
                'description' => 'Jeff Hamilton x NBA Collage Jacket',
                'price' => 1055,
                'stock' => 5,
                'details' => json_encode([
                    'Lining: Satin 100%',
                    'Outer: Lamb Skin 100%, Wool 100%',
                    'Front press-stud fastening'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product23.png'
            ],
            [
                'name' => 'Reiss Bomber',
                'category' => 'bombers',
                'description' => 'Brushed Wool-Blend Bomber Jacket',
                'price' => 260,
                'stock' => 10,
                'details' => json_encode([
                    '53% Wool, 47% Polyester',
                    'Raised central seam to reverse',
                    'Dual front zip'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product24.png'
            ],
            [
                'name' => 'Tom Ford Bomber',
                'category' => 'jackets',
                'description' => 'TOM FORD Hazed Gabardine Jacket',
                'price' => 2000,
                'stock' => 5,
                'details' => json_encode([
                    'OUTER: Lyocell 100%',
                    'Made in Italy',
                    'High neck, Long sleeves',
                    '2-way zip, 2 side zipped pockets'
                ]),
                'sizes' => json_encode(['S', 'M', 'L']),
                'image' => 'img/product25.png'
            ]
        ];

        foreach ($product as $product) {
            Product::create($product);
        }
    }

}

