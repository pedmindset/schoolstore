<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartPageLivewire extends Component
{
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
