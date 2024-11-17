<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Stripe\Stripe;
use Stripe\Charge;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function buy(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $charge = \Stripe\Charge::create([
                'amount' => $product->price * 100,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => $product->name,
            ]);

            return redirect()->route('products.index')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Payment failed: ' . $e->getMessage()]);
        }
    }

}
