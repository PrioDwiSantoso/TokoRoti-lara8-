<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Tbl_roti_category;
use App\Models\Tbl_product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;


class FrontCartController extends Controller
{

    public function add_cart(Request $request)
    {
        // $products_models = Products_models::all();
        // $category_models = Category_models::all();
        Cart::add(
            array(
                'id' => $request->id,
                // inique row ID
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => 1,
                'attributes' => array(
                    'image' => $request->image,
                    'description' => $request->description
                )
            )
        );
        $cartItems = \Cart::getContent();
        // dump($cartItems); 

        $products_models = Tbl_product::all();
        $category_models = Tbl_roti_category::all();
        return back();
    }

    public function update_cart(Request $request)
    {
        Cart::update(
            $request->id,
            array(
                'quantity' => $request->quantity,
                // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
            )
        );
        return back();
    }

    public function view_cart()
    {
        $products_models = Tbl_product::all();
        $category_models = Tbl_roti_category::all();
        $carts = Cart::getContent();
        return view('front.cart', compact('products_models', 'category_models', 'carts'));
    }

    public function remove_item($id)
    {
        Cart::remove($id);

        return back();
    }

    public function clear_item()
    {
        Cart::clear();
        return back();
    }
}
