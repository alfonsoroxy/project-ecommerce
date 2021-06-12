<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sales_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    //Generating Slug in Product Name
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    //Adding new Product
    use WithFileUploads;
    public function addProduct()
    {
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sales_price = $this->sales_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;

        $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;


        $product->category_id = $this->category_id;

        $product->save();
        session()->flash('message', 'Product has been created successfully! ');
    }

    public function render()
    {   //Get the Categories in Add Products
        $categories = Category::all();

        return view('livewire.admin.admin-add-product-component', ['categories' => $categories])->layout('layouts.master');
    }
}
