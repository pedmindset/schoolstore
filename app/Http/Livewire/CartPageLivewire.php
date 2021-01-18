<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\CartTrait;


class CartPageLivewire extends Component
{
    use CartTrait;


    protected $listeners = [
        'updateCart' => 'updateCart',
    ];

    public function render()
    {

        return view('livewire.cart-page');
    }

    public function updateCart()
    {

    }
}
