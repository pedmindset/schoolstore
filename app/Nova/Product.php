<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Fields\BelongsToMany;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Benjacho\BelongsToManyField\BelongsToManyField;


class Product extends Resource
{
    public static $group = "Shop";

    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Models\Product::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'uuid';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'name', 'barcode'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Products');
    }

    /**
    * Get the displayable singular label of the resource.
    *
    * @return  string
    */
    public static function singularLabel()
    {
        return __('Product');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function fields(Request $request)
    {
        return [
            Images::make('Featured', 'featured') // second parameter is the media collection name
            ->conversionOnDetailView('thumb') // conversion used on the model's view
            ->conversionOnIndexView('thumb') // conversion used to display the image on the model's index page
            ->conversionOnForm('thumb') // conversion used to display the image on the model's form
            ->rules('required'),

            Images::make('Cover', 'cover') // second parameter is the media collection name
            ->conversionOnDetailView('thumb') // conversion used on the model's view
            ->conversionOnIndexView('thumb') // conversion used to display the image on the model's index page
            ->conversionOnForm('thumb') // conversion used to display the image on the model's form
            ->hideFromIndex(),

            Images::make('Pictures', 'pictures') // second parameter is the media collection name
            ->conversionOnDetailView('thumb') // conversion used on the model's view
            ->conversionOnIndexView('thumb') // conversion used to display the image on the model's index page
            ->conversionOnForm('thumb') // conversion used to display the image on the model's form
            ->fullSize() // full size column
            ->rules('required')
            ->hideFromIndex(),

            ID::make( __('Id'),  'id')
            ->rules('required')
            ->sortable(),

            BelongsTo::make('Product Category', 'productcategory')
            ->sortable(),

            BelongsTo::make('Brand')
            ->sortable()
            ->nullable(),

            Text::make( __('Name'),  'name')
            ->rules('required')
            ->sortable(),

            Number::make( __('Price'),  'price')
            ->sortable()
            ->step(0.01),

            Number::make( __('Quantity'),  'quantity')
            ->sortable(),

            Textarea::make( __('Description'),  'description')
            ->sortable(),

            Select::make( __('Featured'),  'featured')
            ->sortable()
            ->options([
                'yes' => 'yes',
                'no' => 'no',
            ]),

            Text::make( __('Code'),  'code')
            ->sortable(),

            Text::make( __('Barcode'),  'barcode')
            ->sortable(),

            MorphMany::make('Discounts'),

            // BelongsToManyField::make('Orders', 'Orders', 'App\Nova\Order'),

            HasMany::make('Orders', 'order_products', 'App\Nova\Order'),

            // BelongsToManyField::make('Collections', 'Collections', 'App\Nova\Collection'),

            BelongsToMany::make('Collections'),

            // BelongsToManyField::make('Carts', 'Carts', 'App\Nova\Cart'),

            BelongsToMany::make('Carts'),

            // BelongsToManyField::make('Wishlists', 'Wishlists', 'App\Nova\Wishlist'),

            BelongsToMany::make('Wishlists'),


        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
