<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Josrom\MapAddress\MapAddress;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\MorphMany;
use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;


class Driver extends Resource
{
    public static $group = "Management";

    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Models\Driver::class;

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
        'id', 'name', 'phone'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Drivers');
    }

    /**
    * Get the displayable singular label of the resource.
    *
    * @return  string
    */
    public static function singularLabel()
    {
        return __('Driver');
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
            Images::make('Profile Picture', 'profile') // second parameter is the media collection name
            ->conversionOnDetailView('big') // conversion used on the model's view
            ->conversionOnIndexView('thumb') // conversion used to display the image on the model's index page
            ->conversionOnForm('thumb') // conversion used to display the image on the model's form
            , 

            Files::make('Supporting Documents', 'attachments')
            ->hideFromIndex(),

            ID::make( __('Id'),  'id')
            ->rules('required')
            ->sortable(),

            BelongsTo::make('User')

            ->rules('required')
            ->searchable()
            ->sortable(),

            BelongsTo::make('Vehicle')

            ->rules('required')
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

            Text::make( __('Address'),  'address')
            ->sortable(),

            Text::make( __('Address2'),  'address2')
            ->hideFromIndex()
            ->sortable(),

            Text::make( __('Email'),  'email')
            ->sortable(),

            Date::make( __('Date Of Birth'),  'date_of_birth')
            ->sortable(),

            // Text::make( __('Lng'),  'lng')
            // ->hideFromIndex()
            // ->sortable(),

            // Text::make( __('Lat'),  'lat')
            // ->hideFromIndex()
            // ->sortable(),


            MapAddress::make('Location')
            ->initLocation(5.57, -0.17)
            ->setLatitudeField('lat')
            ->setLongitudeField('lng')
            ->zoom(12),

            MorphMany::make('Trackings')


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
