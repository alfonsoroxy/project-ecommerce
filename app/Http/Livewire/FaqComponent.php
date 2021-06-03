<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class FaqComponent extends Component
{
    public function render()
    {
        return view('livewire.faq-component')->layout('layouts.master');
    }
}
