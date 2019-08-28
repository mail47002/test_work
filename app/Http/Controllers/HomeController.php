<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    public function index($id)
    {
        $category =  Category::find($id);
        $products =  Product::query();
        $products->whereHas('categories', function ($q) use ($id) {
            $q->where('category_id', $id);
        });

        return view('home', [
            'category'         => $category,
            'products'         => $products->get(),
        ]);
    }

    public function product($id)
    {
        $product = Product::find($id);
        $attributes = $product->attributes;
        $attributes_data = [];

        foreach ($attributes as $attribute) {
            $attributes_data[] = array(
                'name' => $attribute->translate['title'],
                'text' => $attribute->translate['description'],
            );
        }
    $data = array(
        'name' => $product->translate['title'],
        'article' => $product->article,
        'price' => $product->price,
        'attridutes' => $attributes_data
    );

        return response()->json($data, 200);
    }


}
