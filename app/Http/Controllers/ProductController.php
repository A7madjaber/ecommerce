<?php

namespace App\Http\Controllers;

use App\Model\Admin\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product($id)
    {

        $product = Product::findOrFail($id);

        return view('front.product-details', compact('product'));

    }

    public function addCart(Request $request)
    {

        $product = Product::findOrFail($request->product_id);

        $price = $product->discount_price == null ? $product->price : $product->discount_price;

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $price,
            'weight' => 1,
            'options' =>
                ['size' => $request->size,
                    'image' => $product->image_one,
                    'color' => $request->color,
                ]

        ]);
        return redirect()->back()->with(['message' => 'Product Successfully Added to Cart', 'alert-type' => 'success']);

    }


    public function view($id)
    {
        $product = Product::findOrFail($id);
        $category=$product->category->category_name;
        $brand=@$product->brand->brand_name;
        $subCategory=@$product->subcategory->subcategory_name;


        $color = explode(',', $product->color);

        $size = explode(',', $product->size);

        return response()->json(array(
            'product' => $product,
            'color' => $color,
            'size' => $size,
            'category'=>$category,
            'brand'=>$brand,
            'subcategory'=>$subCategory,

        ));

    }
}
