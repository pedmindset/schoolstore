<?php

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'=> 'Alcoholic Drink',
                'description'=> 'Alcoholic Drink',
            ],
            [
                'name'=> 'Baked Beans',
                'description'=> 'Baked Beans',
                'featured'=> 'yes'
            ],
            [
                'name'=> 'Biscuit',
                'description'=> 'Biscuit',
            ],
            [
                'name'=> 'Cafe',
                'description'=> 'Cafe',
                'featured'=> 'yes'
            ],
            [
                'name'=> 'Can Fish',
                'description'=> 'Can Fish',
            ],
            [
                'name'=> 'Cocoa Beverage',
                'description'=> 'Cocoa Beverage',
            ],
            [
                'name'=> 'Condensed Milk',
                'description'=> 'Condensed Milk',
            ],
            [
                'name'=> 'Confectionery',
                'description'=> 'Confectionery',
            ],
            [
                'name'=> 'Corned Beef',
                'description'=> 'Corned Beef',
            ],
            [
                'name'=> 'Fruit Juice',
                'description'=> 'Fruit Juice',
                'featured'=> 'yes'
            ],
            [
                'name'=> 'Hand Napkin',
                'description'=> 'Hand Napkin',
            ],
            [
                'name'=> 'Hand Towel',
                'description'=> 'Hand Towel',
            ],
            [
                'name'=> 'Infant Formula',
                'description'=> 'Infant Formula',
            ],
            [
                'name'=> 'Laundry Soap',
                'description'=> 'Laundry Soap',
            ],
            [
                'name'=> 'Liquid Soap',
                'description'=> 'Liquid Soap',
            ],
            [
                'name'=> 'Mackerel',
                'description'=> 'Mackerel',
                'featured'=> 'yes'
            ],
            [
                'name'=> 'Margarine',
                'description'=> 'Margarine',
            ],
            [
                'name'=> 'Mayonnaise',
                'description'=> 'Mayonnaise',
            ],
            [
                'name'=> 'Milk Powder',
                'description'=> 'Milk Powder',
                'featured'=> 'yes'
            ],
            [
                'name'=> 'Milk',
                'description'=> 'Milk',
            ],
            [
                'name'=> 'Mineral Water',
                'description'=> 'Mineral Water',
            ],
            [
                'name'=> 'Noodles',
                'description'=> 'Noodles',
                'featured'=> 'yes'
            ],
            [
                'name'=> 'Pomade',
                'description'=> 'Pomade',
            ],
            [
                'name'=> 'Rice',
                'description'=> 'Rice',
                'featured'=> 'yes'
            ],
            [
                'name'=> 'Salt',
                'description'=> 'Salt',
            ],
            [
                'name'=> 'Sardine',
                'description'=> 'Sardine',
            ],
            [
                'name'=> 'Soap',
                'description'=> 'Soap',
            ],
            [
                'name'=> 'Soya Bean Oil',
                'description'=> 'Soya Bean Oil',
            ],
            [
                'name'=> 'Spaghetti',
                'description'=> 'Spaghetti',
            ],
            [
                'name'=> 'Sugar',
                'description'=> 'Sugar',
            ],
            [
                'name'=> 'Sunflower Oil',
                'description'=> 'Sunflower Oil',
            ],
            [
                'name'=> 'Toilet Roll',
                'description'=> 'Toilet Roll',
            ],
            [
                'name'=> 'Toilet Soap',
                'description'=> 'Toilet Soap',
            ],
            [
                'name'=> 'Tomato Paste',
                'description'=> 'Tomato Paste',
            ],
            [
                'name'=> 'Tooth Brush',
                'description'=> 'Tooth Brush',
            ],
            [
                'name'=> 'Vegetable Oil',
                'description'=> 'Vegetable Oil',
            ],
            [
                'name'=> 'Washing Powder',
                'description'=> 'Washing Powder',
            ],
        ];

        foreach ($categories as $cat) {
            $category = ProductCategory::create($cat);
           if(Storage::exists('product_categories/'. $cat['name'] . '.jpg')){
               if(!(ProductCategory::where('name', $cat['name'])->first())){
                    $category = ProductCategory::create($cat);
                    $category->addMedia(storage_path('app/product_categories/'. $cat['name'] . '.jpg'), 'local')
                    ->toMediaCollection('featured');
               };

           }
        }
    }
}
