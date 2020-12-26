<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;


class Transaction extends Resource
{
    public static $group = "Finance";

    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Models\Transaction::class;

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
        'id', 'amount', 'transaction_id'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Transactions');
    }

    /**
    * Get the displayable singular label of the resource.
    *
    * @return  string
    */
    public static function singularLabel()
    {
        return __('Transaction');
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

            Text::make( __('Uuid'),  'uuid')
            ->onlyOnDetail()
            ->sortable(),

            Text::make( __('Transaction Id'),  'transaction_id')
            ->onlyOnDetail()
            ->sortable(),

            BelongsTo::make('User')
            ->rules('required')
            ->searchable()
            ->sortable(),

            Currency::make( __('Amount'),  'amount')
            ->rules('required')
            ->sortable(),

            Select::make( __('Status'),  'status')
            ->sortable()
            ->options([
                'success' => 'success',
                'pending' => 'pending',
                'failed' => 'failed',
                'denied' => 'denied',
                'cancelled' => 'cancelled',
            ]),

            Select::make( __('Payment Method'),  'payment_method')
            ->sortable()
            ->options([
                'mtn' => 'mtn',
                'vodafone' => 'vodafone',
                'airteltigo' => 'airteltigo',
                'card' => 'card',
                'bank' => 'bank',
                'wallet' => 'wallet'
            ]),

            Select::make( __('Type'),  'type')
            ->sortable()
            ->options([
                'credit' => 'credit',
                'checkout' => 'checkout payment',
                'loan credit' => 'loan credit',
                'loan repayment' => 'loan repayment',
                'loan request' => 'loan request',
            ]),

            HasMany::make('Receipts')

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
        return [
            (new \App\Nova\Metrics\NewTransactions)->width('1/4'),
            (new \App\Nova\Metrics\Transactions)->width('1/4'),
            (new \App\Nova\Metrics\WeeklyTransactions)->width('1/4'),
            (new \App\Nova\Metrics\TransactionsStatus)->width('1/4'),
        ];
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
