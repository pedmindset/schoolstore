<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartViewLivewire extends Component
{

    protected $listeners = [
        'updateCart' => 'updateCart',
    ];

    public function mount()
    {
    }

    public function updateCart()
    {
    }

    public function render()
    {
        return view('livewire.cart-view');
    }
}
