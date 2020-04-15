<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\DateTime;


class Customer extends Resource
{
    public static $group = "Shop";

    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Models\Customer::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'name'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Customers');
    }

    /**
    * Get the displayable singular label of the resource.
    *
    * @return  string
    */
    public static function singularLabel()
    {
        return __('Customer');
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

            BelongsTo::make('User')

            ->searchable()
            ->sortable(),

            BelongsTo::make('School')

            ->searchable()
            ->sortable(),

            Text::make( __('Name'),  'name')
            ->rules('required')
            ->sortable(),

            Text::make( __('Phone'),  'phone')
            ->sortable(),

            Text::make( __('Phone2'),  'phone2')
            ->hideFromIndex()
            ->sortable(),

            Text::make( __('Email'),  'email')
            ->sortable(),

            Text::make( __('Address'),  'address')
            ->sortable(),

            Text::make( __('Address2'),  'address2')
            ->hideFromIndex()
            ->sortable(),

            Date::make( __('Date Of Birth'),  'date_of_birth')
            ->hideFromIndex()
            ->sortable(),

            Text::make( __('Level'),  'level')
            ->hideFromIndex()
            ->sortable(),

            Text::make( __('Postcode'),  'postcode')
            ->sortable(),

            Place::make( __('City'),  'city')
            ->sortable()
            ->countries([
                    'GH',
                ])
            ->onlyCities(),
            Text::make( __('Region'),  'region')
            ->hideFromIndex()
            ->sortable(),

            Country::make( __('Country'),  'country')
            ->hideFromIndex()
            ->sortable(),

            Text::make( __('Lng'),  'lng')
            ->hideFromIndex()
            ->sortable(),

            Text::make( __('Lat'),  'lat')
            ->hideFromIndex()
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
