<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class MainController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('tag') && $request->tag !== 'all') {
            $query->where('tag', $request->tag);
        }

        $products = $query->paginate(12);

        // Get unique tags from DB
        $tags = Product::select('tag')->distinct()->pluck('tag');

        $cart = ShoppingCart::where('user_id', auth()->guard()->id())->first();

        if ($cart) {
            $cart->load('items.product');
        }

        return view('home', compact('products', 'tags', 'cart'));
    }

    public function addToCart(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // Assuming you have a ShoppingCart model and a relationship set up
        $user = auth()->guard()->user();
        if (!$user) {
            return redirect('/login')->with('error', 'You must be logged in to add items to your cart.');
        }
        $cart = ShoppingCart::firstOrCreate(['user_id' => $user->id]);

        // Add item to cart
        $cartItem = CartItem::updateOrCreate(
            ['shopping_cart_id' => $cart->id, 'product_id' => $request->product_id],
            ['quantity' => DB::raw('quantity + ' . $request->quantity)]
        );



        return redirect('/')->with('success', 'Product added to cart successfully!');
    }

    public function Checkout(Request $request)
    {
        $user = auth()->guard()->user();
        if (!$user) {
            return redirect('/login')->with('error', 'You must be logged in to view your cart.');
        }
        $cart = ShoppingCart::where('user_id', $user->id)->first();

        if (!$cart) {
            return redirect('/')->with('error', 'Your cart is empty.');
        }

        $cart->load('items.product');

        return view('checkout', compact('cart'));
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/')->with('success', 'Product deleted successfully!');
    }
    public function deleteItem($id)
    {
        $user = auth()->guard()->user();
        if (!$user) {
            return redirect('/login')->with('error', 'You must be logged in to modify your cart.');
        }
        $cart = ShoppingCart::where('user_id', $user->id)->first();

        if (!$cart) {
            return redirect('/')->with('error', 'Your cart is empty.');
        }

        $item = CartItem::where('shopping_cart_id', $cart->id)
            ->where('product_id', $id)
            ->first();

        if ($item->quantity > 1) {
            $item->quantity -= 1;
            $item->save();
        } else {
            $item->delete();
        }
        return redirect()->back()->with('success', 'Item removed from cart successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('q'); // coming from AJAX

        if (isset($query) && $query != '') {
            $products = Product::query()
                ->where('name', 'like', "%{$query}%")
                ->orWhere('tag', 'like', "%{$query}%")
                ->take(10) // limit results for speed
                ->get();
        } else {
            $products = '';
        }
        // return JSON for JS to consume
        return response()->json($products);

        // or if you prefer a Blade snippet:
        // return view('partials.product_list', compact('products'))->render();
    }

    public function addItemPage()
    {
        if (!auth()->guard()->user()->is_admin) {
            return redirect('/')->with('error', 'You dont have acess to that page');
        } else {
            return view('add');
        }
    }
    public function editItemPage($id)
    {

        if (!auth()->guard()->user()->is_admin) {
            return redirect('/')->with('error', 'You dont have acess to that page');
        } else {


            $product = Product::findOrFail($id);

            return view('edit', compact('product'));
        }
    }


    public function addNewItem(Request $request)
    {
        try {
            $validatedProduct = $request->validate([
                'name' => 'required|string|max:255',
                'tag' => 'required|string|max:100',
                'price' => 'required|numeric|min:0',
                'quantity' => 'required|string',
                'image' => 'required|mimes:jpeg,png,jpg,webp,avif',
                'admin_id' => 'required|integer',
            ]);

            // Try storing the image
            $validatedProduct['image'] = $request->file('image')->store('', 'public');

            // Try creating product
            $product = Product::create($validatedProduct);

            return redirect('/')->with('success', 'Product added successfully!');
        } catch (Exception $e) {
            // Log the full error with stack trace
            Log::error('Error adding new product: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'input' => $request->all(),
            ]);

            // Optionally show a browser message for dev
            if (config('app.debug')) {
                return back()->withErrors(['error' => $e->getMessage()]);
            }

            // Otherwise, show a general user-friendly message
            return back()->with('error', 'Something went wrong while adding the product.');
        }
    }

    public function updateProduct(Request $request)
    {
        $validatedProduct = $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'required|string|max:100',
            'price' => 'required|min:0',
            'quantity' => 'required',
            'image' => 'mimes:jpeg,png,jpg,webp,avif',
            'admin_id' => 'required',
        ]);
        $product = Product::findOrFail($request->id);
        if ($request->hasFile('image')) {
            $validatedProduct['image'] = $request->file('image')->store('', 'public');
        } else {
         $validatedProduct['image'] = $product->image;
        };
        $product->update($validatedProduct);

        return redirect('/')->with('success', 'Product updated successfully.');
    }
}
