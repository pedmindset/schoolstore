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
            [
                'product_category_id' => 1,
                'name' => 'Club Lager Large',
                'description' => 'CLUB has been brewed with the same dedication to quality since 1931 and has been Ghana’s number one selling beer for most of that period.',
                'price' => 33.0,
                'quantity' => 20,
            ],
            [
                'product_category_id' => 3,
                'name' => 'Famous Amos Chocolate Cookies 56g',
                'description' => 'There are 280 calories in a 1 package serving of Famous Amos Chocolate Chip Bite Size Cookies(56g)',
                'price' => 105.00,
                'quantity' => 100,
                'featured' => 'yes',
            ],
        ];

        $images = [
            "https://marketexpress.com.gh/2344-thickbox_default/club-beer-625ml-bottle-x-12.jpg",
            "https://marketexpress.com.gh/1424-thickbox_default/famous-amos-chocolate-cookies-56g.jpg",
        ];

        foreach ($products as $i =>$product) {
            $p = Product::create($product);
            $p->addMediaFromUrl($images[$i])
                    ->toMediaCollection('cover');
        }
    }
}
