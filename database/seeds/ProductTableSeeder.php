<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            // [
            //     'product_category_id' => 1,
            //     'name' => 'Club Lager Large',
            //     'description' => 'CLUB has been brewed with the same dedication to quality since 1931 and has been Ghana’s number one selling beer for most of that period.',
            //     'price' => 33.0,
            //     'quantity' => 20,
            // ],
            // [
            //     'product_category_id' => 3,
            //     'name' => 'Famous Amos Chocolate Cookies 56g',
            //     'description' => 'There are 280 calories in a 1 package serving of Famous Amos Chocolate Chip Bite Size Cookies(56g)',
            //     'price' => 105.00,
            //     'quantity' => 100,
            //     'featured' => 'yes',
            // ],
            [
                'product_category_id' => 20,
                'name' => 'Ideal Milk 160g',
                'description' => 'Ideal Milk 160g. Ideal Original, Ghana’s favorite milk is made from full cream milk with natural calcium and enriched with vitamin D.',
                'price' => 4.00,
                'quantity' => 20,
            ],
            [
                'product_category_id' => 4,
                'name' => 'Nescafe Classic 2g - Pack of 120',
                'description' => 'This Nescafe Classic pack contains 120 pieces of 2g packed coffee. Start a perfect day with Nescafe Classic.',
                'price' => 60.00,
                'quantity' => 100,
                'featured' => 'yes',
            ],


            [
                'product_category_id' => 17,
                'name' => 'Nutella Hazelnut Spread 350g',
                'description' => 'Nutella Hazelnut Spread 350g',
                'price' => 30.0,
                'quantity' => 20,
            ],
            [
                'product_category_id' => 20,
                'name' => 'Dano UHT Full Cream Milk 1L',
                'description' => 'Dano UHT Full Cream Milk 1L 3.5% Fat Natural Source of Calcium, Protein, Vitamin & Minerals. Milk Goodness!',
                'price' => 9.00,
                'quantity' => 100,
                'featured' => 'yes',
            ],
            [
                'product_category_id' => 13,
                'name' => 'TomVita Fortified Cereal-Legume Blend 200g',
                'description' => 'TomVita Fortified Cereal-Legume Blend 200g Ready to eat Tom Brown. All you need is to add boiled water and stir..',
                'price' => 3.50,
                'quantity' => 20,
                'featured' => 'yes'
            ],
            [
                'product_category_id' => 29,
                'name' => 'Oba Spaghetti 475g',
                'description' => 'Oba Spaghetti 475g',
                'price' => 3.50,
                'quantity' => 100,
            ],


            [
                'product_category_id' => 19,
                'name' => 'Dano Cool Cow Instant Filled Milk Powder 400g Tin',
                'description' => 'Dano Cool Cow Instant Filled Milk Powder 400g Tin. Vitamin A + D, Protein & Calcium',
                'price' => 18.00,
                'quantity' => 20,
            ],
            [
                'product_category_id' => 13,
                'name' => 'Fortin Oats 500g',
                'description' => 'Fortin Oats 500g',
                'price' => 8.00,
                'quantity' => 20,
            ],
            [
                'product_category_id' => 18,
                'name' => 'Heinz Tomato Ketchup 1.35kg',
                'description' => 'Heinz Tomato Ketchup 1.35kg',
                'price' => 32.00,
                'quantity' => 20,
                'featured' => 'yes'
            ],
            [
                'product_category_id' => 24,
                'name' => 'Benjie Long Grain Rice 5x5kg',
                'description' => 'Benjie Long Grain Rice 5x5kg - Local Perfumed Rice. Jasmine Fragrance',
                'price' => 189.00,
                'quantity' => 100,
            ],


            [
                'product_category_id' => 7,
                'name' => 'Peak Milk (Green) Sachets 30g -Strip of 6',
                'description' => 'Peak Milk (Green) Sachets 30g -Strip of 6',
                'price' => 6.00,
                'quantity' => 20,
            ],
            [
                'product_category_id' => 2,
                'name' => 'Heinz Baked Beans 200g - Pack of 48',
                'description' => 'Heinz Baked Beans 200g - Pack of 48',
                'price' => 10.00,
                'quantity' => 20,
                'featured' => 'yes'
            ],
            [
                'product_category_id' => 30,
                'name' => 'Primier Gold Brown Sugar 900g',
                'description' => 'Primier Gold Brown Sugar 900g. Rich in molasses. A healthy sweetener',
                'price' => 32.00,
                'quantity' => 20,
                'featured' => 'yes'
            ],
            [
                'product_category_id' => 24,
                'name' => "Nana's Rice 1kg - Short Grain Rice",
                'description' => "Nana's Rice 1kg - Short Grain Rice. Naturally Healthy. Happy Eating. Grown and Produced in Ghana",
                'price' => 8.00,
                'quantity' => 100,
            ],


            [
                'product_category_id' => 7,
                'name' => "Nana's Rice 1kg - Long Grain Rice",
                'description' => "Nana's Rice 1kg - Short Grain Rice. Naturally Healthy. Happy Eating. Grown and Produced in Ghana",
                'price' => 13.00,
                'quantity' => 20,
                'featured' => 'yes'
            ],
            [
                'product_category_id' => 16,
                'name' => 'Ena Pa Mackerel 155g',
                'description' => 'Ena Pa Mackerel 155g',
                'price' => 3.25,
                'quantity' => 20,
                'featured' => 'yes'
            ],
            [
                'product_category_id' => 16,
                'name' => 'StarKist Tuna Flakes in Sunflower Oil 160g',
                'description' => 'StarKist Tuna Flakes in Sunflower Oil 160g',
                'price' => 12.00,
                'quantity' => 20,
                'featured' => 'yes'
            ],
            [
                'product_category_id' => 24,
                'name' => "Cadbury Richoco 500g",
                'description' => "Cadbury Richoco 500g",
                'price' => 10.50,
                'quantity' => 100,
                'featured' => 'yes'
            ],



            [
                'product_category_id' => 27,
                'name' => "Irish Spring Original Bar Soap 106.3g",
                'description' => "Irish Spring Original Bar Soap 106.3g",
                'price' => 4.00,
                'quantity' => 20,
                'featured' => 'yes'
            ],
            [
                'product_category_id' => 6,
                'name' => 'Milo Tin - Hot Chocolate 400g',
                'description' => 'Nestle Milo Tin - Hot Chocolate 400g.Barley malt extract, Skimmed milk powder, Sugar, Cocoapowder, Vegetable oil, Calcium phosphate, Sodium phosphate,Vitamin C, Nicotinamide, Ferric Phosphate, Vanillin, Vitamin D,Vitamin B6, Vitamin B2, Vitamin B12. Contain gluten and milk.',
                'price' => 18.00,
                'quantity' => 20,
                'featured' => 'yes'
            ],
            [
                'product_category_id' => 27,
                'name' => 'Sunlight Pure Bar Soap 150g',
                'description' => 'Sunlight Pure Bar Soap 150g',
                'price' => 1.50,
                'quantity' => 20,
                'featured' => 'yes'
            ],
            [
                'product_category_id' => 17,
                'name' => "Blue Band Medium Fat Spread For Bread 250g",
                'description' => "Blue Band Medium Fat Spread For Bread 250g",
                'price' => 3.20,
                'quantity' => 100,
                'featured' => 'yes'
            ],


        ];

        $images = [
            // "https://marketexpress.com.gh/2344-thickbox_default/club-beer-625ml-bottle-x-12.jpg",
            // "https://marketexpress.com.gh/1424-thickbox_default/famous-amos-chocolate-cookies-56g.jpg",
            "https://marketexpress.com.gh/89-thickbox_default/ideal-milk-160g.jpg",
            "https://marketexpress.com.gh/755-thickbox_default/nescafe-classic-2g-pack-of-120.jpg",
            "https://marketexpress.com.gh/462-thickbox_default/nutella-hazelnut-spread-350g.jpg",
            "https://marketexpress.com.gh/2983-thickbox_default/dano-uht-full-cream-milk-1l.jpg",
            "https://marketexpress.com.gh/3079-thickbox_default/tomvita-fortified-cereal-legume-blend-200g.jpg",
            "https://marketexpress.com.gh/2988-thickbox_default/oba-spaghetti-475g.jpg",
            "https://marketexpress.com.gh/2982-thickbox_default/dano-cool-cow-instant-filled-milk-powder-400g-tin.jpg",
            "https://marketexpress.com.gh/3107-thickbox_default/fortin-oats-500g.jpg",
            "https://marketexpress.com.gh/3192-thickbox_default/heinz-tomato-ketchup-135kg.jpg",
            "https://marketexpress.com.gh/3223-thickbox_default/benjie-long-grain-rice-5x5kg.jpg",
            "https://marketexpress.com.gh/3310-thickbox_default/peak-milk-green-sachets-30g-strip-of-6.jpg",
            "https://marketexpress.com.gh/3326-thickbox_default/heinz-baked-beans-200g-pack-of-48.jpg",
            "https://marketexpress.com.gh/3336-thickbox_default/primier-gold-brown-sugar-900g.jpg",
            "https://marketexpress.com.gh/3362-thickbox_default/nana-s-rice-1kg-short-grain-rice.jpg",
            "https://marketexpress.com.gh/3363-thickbox_default/nana-s-rice-1kg-long-grain-rice.jpg",
            "https://marketexpress.com.gh/3389-thickbox_default/ena-pa-mackerel-155g.jpg",
            "https://marketexpress.com.gh/1139-thickbox_default/starkist-tuna-flakes-in-sunflower-oil-160g.jpg",
            "https://marketexpress.com.gh/76-thickbox_default/cadbury-richoco-500g.jpg",
            "https://marketexpress.com.gh/816-thickbox_default/irish-spring-original-bar-soap.jpg",
            "https://marketexpress.com.gh/1753-thickbox_default/nestle-milo-tin-hot-chocolate-400g.jpg",
            "https://marketexpress.com.gh/288-thickbox_default/sunlight-pure-bar-soap-150g.jpg",
            "https://marketexpress.com.gh/271-thickbox_default/blue-band-medium-fat-spread-for-bread-250g.jpg",

        ];

        foreach ($products as $i =>$product) {
            $p = Product::create($product);
            $p->addMediaFromUrl($images[$i])
                    ->toMediaCollection('cover');
        }
    }
}
