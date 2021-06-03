<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class ContactComponent extends Component
{
  public $contact_name;
  public $contact_email;
  public $contact_number;
  public $contact_message;


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'contact_name' => 'required',
            'contact_email' => 'required | email',
            'contact_number' => 'required | numeric',
            'contact_message' => 'required',
        ]);
    }

    public function addContact()
    {
        $this->validate([
            'contact_name' => 'required',
            'contact_email' => 'required | email',
            'contact_number' => 'required | numeric',
            'contact_message' => 'required',
        ]);

        $contact = new Contact();
        $contact->contact_name = $this->contact_name;
        $contact->contact_email = $this->contact_email;
        $contact->contact_number = $this->contact_number;
        $contact->contact_message = $this->contact_message;

        $contact->save();
        session()->flash('message', 'Your review has been added successfully! ');

        // dd($this->contact_name, $this->contact_email, $this->contact_number, $this->contact_message);

    }

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

    // Delete Product in Cart
    public function destroy($rowId)
    {
      Cart::remove($rowId);
      session()->flash('success_message', 'Item has been removed');
      return redirect()->route('product.cart');
    }

    public function render()
    {
        return view('livewire.contact-component')->layout('layouts.master');
    }
}
