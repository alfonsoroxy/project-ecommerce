<?php

namespace App\Http\Livewire;


use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    //For Page Pagination
    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 3;
    }

    //For Add to Cart
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1 ,$product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
    }

    //For Sorting
    use WithPagination;
    public function render()
    {
        if($this->sorting=='date')
        {
            //Sorting By Arrival
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=="price")
        {
            //Sorting By High to Low
            $products = Product::orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price-desc')
        {
            //Sorting by Low to High
            $products = Product::orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        }
        else {
            $products = Product::paginate($this->pagesize);
        }

        //
        $categories = Category::all();

        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories])->layout('layouts.master');
    }

}
