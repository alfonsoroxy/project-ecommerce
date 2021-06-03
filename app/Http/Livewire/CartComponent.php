<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    //Increase Product in Cart
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
    }

    //Decrease Product in Cart
    public function decreaseQuantity($rowId)
    {
      $product = Cart::get($rowId);
      $qty = $product->qty - 1;
      Cart::update($rowId, $qty);
    }

    // Delete Product in Cart
    public function destroy($rowId)
    {
      Cart::remove($rowId);
      session()->flash('success_message', 'Item has been removed');
    }

    //Delete all Product in Cart
    public function destroyAll()
    {
      Cart::destroy();
    }

    //Checking if the User has already an account
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

    public function setAmountForCheckout()
    {
        if(!Cart::count() > 0)
        {
            session()->forget('checkout');
            return;
        }

        session()->put('checkout', [
            //'discount' => 0,
            'subtotal' => Cart::subtotal(),
            'tax' => Cart::tax(),
            'total' => Cart::total()
            ]);

            //Code for Discount
            // if(session()->has('coupon'))
            // {
            //     session()->put('checkout', [
            //       'discount' => $this->discount,
            //       'subtotal' => $this->subtotalAfterDiscount,
            //       'tax' => $this->taxAfterDiscount,
            //       'total' => $this->totalAfterDiscount
            //     ]);
            // }
    }

    //View Cart Layout
    public function render()
    {
        $this->setAmountForCheckout();

        return view('livewire.cart-component')->layout('layouts.master');
    }
}
