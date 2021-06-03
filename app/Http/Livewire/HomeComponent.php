<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{

    //Authentication
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

    //For Add to Cart
    public function store($fproduct_id, $fproduct_name, $fproduct_price)
    {
        Cart::add($fproduct_id, $fproduct_name, 1 ,$fproduct_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
    }

    // Delete Product in Cart
    public function destroy($rowId)
    {
      Cart::remove($rowId);
      session()->flash('success_message', 'Item has been removed');
      return redirect()->route('product.cart');
    }

    public function render()
    {
        //Featured Products
        $fproducts = Product::orderBy('regular_price', 'DESC')->get()->take(3);

        return view('livewire.home-component', ['fproducts' => $fproducts])->layout('layouts.master');
    }

}
