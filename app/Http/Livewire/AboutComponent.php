<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class AboutComponent extends Component
{
    //Authentication for Checking out
    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    // Delete Product
    public function destroy($rowId)
    {
      Cart::remove($rowId);
      session()->flash('success_message', 'Item has been removed');
      return redirect()->route('product.cart');
    }

    public function render()
    {
        return view('livewire.about-component')->layout('layouts.master');
    }
}
