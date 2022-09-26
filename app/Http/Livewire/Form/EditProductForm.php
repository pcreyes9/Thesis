<?php

namespace App\Http\Livewire\Form;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class EditProductForm extends Component
{
    public $modelID;


    public function render()
    {
        dd("EDIT FORM");
        // dd($this->$modelID);
        // $product = Product::findorFail($this->$modelID);
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();
        
        $images = $product->images;

        return view('livewire.form.edit-product-form', compact('product'),[
          'categories' => $categories,
          'brands' => $brands,
          'images' => $images,
        ]);

        return view('livewire.form.edit-product-form');
    }
}
