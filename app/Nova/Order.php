<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;


class Order extends Resource
{
    public static $group = "Shop";

    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Models\Order::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'amount';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Orders');
    }

    /**
    * Get the displayable singular label of the resource.
    *
    * @return  string
    */
    public static function singularLabel()
    {
        return __('Order');
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
                ID::make( __('Id'),  'id')
                ->rules('required')
                ->sortable(),

                BelongsTo::make('Customer')
                ->searchable()
                ->sortable(),

                Currency::make( __('Amount'),  'amount')
                ->sortable(),

                Select::make( __('Status'),  'status')
                ->sortable()
                ->options([
                    'delivered' => 'delivered',
                    'indelivery' => 'indelivery',
                    'delayed' => 'delayed',
                    'success' => 'success',
                    'processing' => 'processing',
                    'failed' => 'failed',
                    'cancelled' => 'cancelled',
                ]),

                Text::make( __('Lng'),  'lng')
                ->onlyOnDetail()
                ->sortable(),

                Text::make( __('Lat'),  'lat')
                ->onlyOnDetail()
                ->sortable(),
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
