<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Product;
use App\Sale;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $buyers = Buyer::all();
        return view('cart.index', compact('buyers'));

    }
    // using laravel session
    public function addToCart(Request $request,$id)
    {
        {

            $product = Product::find($id);

            if(!$product) {

                abort(404);

            }

            $cart = session()->get('cart');

            // if cart is empty then this the first product
            if(!$cart) {

                $cart = [
                        $id => [
                            "id" => $product->id,
                            "name" => $product->name,
                            "category" => $product->category->name,
                            "type" => $product->type->name ,
                            "quantity" => 1,
                            "price" => $product->price,
                        ]
                ];

                session()->put('cart', $cart);

                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }

            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$id])) {

                $cart[$id]['quantity']++;

                session()->put('cart', $cart);

                return redirect()->back()->with('success', 'Product added to cart successfully!');

            }

            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "category" => $product->category->name,
                "type" => $product->type->name ,
                "quantity" => 1,
                "price" => $product->price,
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }
    public function updateCart(Request $request)
    { // Update is made only for change of the quantity

        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $product = Product::where('id', $cart[$request->id])->first();
            if($request->quantity > $product->quantity){
                // return redirect('/cart')->withErrors('Nuk ka sasi te mjaftueshme per këtë produkt: '.$product->name);
                session()->flash('error','Nuk ka sasi te mjaftueshme per këtë produkt: '.$product->name);
            }else {

                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart',$cart);
                session()->flash('success','Cart updated successfully');
            }

        }
    }
    public function remove(Request $request)
    {
        if($request->id)
        {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success', 'product deleted successfully');
        }
    }

    public function store(Request $request)
    {
        $selectedBuyer = $request->get('buyer_id');
        $cart = session()->get('cart');
        // dd($products);
        foreach ($cart as $cartProd) {
            Sale::create(
                array_merge(
                    [

                        'buyer_id' => $selectedBuyer,
                        'product_id' => $cartProd['id'],
                        'quantity' => $cartProd['quantity'],
                        'total_sum' =>  $cartProd['price'] * $cartProd['quantity'] ,
                    ]
                )
            );

                $product = Product::where('id',$cartProd['id'])->first();
                if($product->quantity - $cartProd['quantity'] < 0){
                   return redirect('/cart')->withErrors('Nuk ka sasi te mjaftueshme per këtë produkt: '.$product->name);
                }else {

                    $product->update(
                            [

                                'quantity' => $product->quantity - $cartProd['quantity'],

                            ]

                        );
                }

        }
        session()->flush();
        return redirect("/products");

    }
}
