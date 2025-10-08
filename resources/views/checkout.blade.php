<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-lightyel min-h-screen px-30">
    <x-layout :cart="$cart">
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-6 text-center">Checkout</h1>

            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Your Cart</h2>

                @php
                $subtotal = 0;
                @endphp

                @if($cart && $cart->items->count())
                <div class="divide-y">
                    @foreach($cart->items as $item)
                    @php
                    $lineTotal = $item->quantity * $item->product->price;
                    $subtotal += $lineTotal;
                    @endphp
                    <div class="flex justify-between items-center py-4">
                        <div class="flex items-center space-x-4">
                            <img src="assets/{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded">
                            <div>
                                <p class="font-medium">{{ $item->product->name }}</p>
                                <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-medium">${{ number_format($lineTotal, 2) }}</p>
                            <p class="text-sm text-gray-500">(${{ number_format($item->product->price, 2) }} each)</p>
                        </div>
                        <form method="post" action="{{ route('item.destroy', $item->product_id) }}">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="bg-red-500 rounded text-white px-4 py-2 mt-2 hover:bg-red-700">Delete</button>

                        </form>
                    </div>

                    @endforeach
                </div>

                <!-- Totals -->
                <div class="mt-6 border-t pt-4">
                    <div class="flex justify-between">
                        <span class="font-medium">Subtotal</span>
                        <span class="font-medium">${{ number_format($subtotal, 2) }}</span>
                    </div>
                    @php
                    // just an example tax, change as needed
                    $tax = $subtotal * 0.1;
                    $total = $subtotal + $tax;
                    @endphp
                    <div class="flex justify-between text-sm text-gray-500">
                        <span>Tax (10%)</span>
                        <span>${{ number_format($tax, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold mt-2">
                        <span>Total</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <!-- Checkout Button -->
                <div class="mt-6 text-right">

                    @csrf
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Proceed to Payment
                    </button>

                </div>
                @else
                <p class="text-gray-500">Your cart is empty.</p>
                @endif
            </div>
        </div>
    </x-layout>
</body>

</html>