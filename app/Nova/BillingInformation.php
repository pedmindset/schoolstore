<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\DateTime;


class BillingInformation extends Resource
{
    public static $group = "Finance";

    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Models\BillingInformation::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'phone';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'phone', 'email'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Billing Informations');
    }

    /**
    * Get the displayable singular label of the resource.
    *
    * @return  string
    */
    public static function singularLabel()
    {
        return __('Billing Information');
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

            Select::make( __('Payment Method'),  'payment_method')
            ->rules('required')
            ->sortable()
            ->options([
                'mtn' => 'mtn',
                'vodafone' => 'vodafone',
                'airteltigo' => 'airteltigo',
                'card' => 'card',
                'bank' => 'bank',
            ]),
                        
                        Text::make( __('Momo Number'),  'momo_number')
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

            Text::make( __('Postcode'),  'postcode')
            ->hideFromIndex()
            ->sortable(),

            Place::make( __('City'),  'city')
            ->sortable()
            ->countries([
                    'GH',
                ])
            ->onlyCities()
                ,
                            Text::make( __('Region'),  'region')
            ->hideFromIndex()
            ->sortable(),

            Text::make( __('Country'),  'country')
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
