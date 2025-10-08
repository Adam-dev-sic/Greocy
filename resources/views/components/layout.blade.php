<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div
        class="flex flex-col bg-customgreen items-center rounded-xl  m-10 md:flex-row">
        <div class="flex w-1/3 p-4 space-x-4 items-center">
            <!-- <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="white"
                class="size-10">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
            </svg> -->
            <a href="/">
                <img
                    src="{{ asset('assets/GREOCY-logo-transparent.png') }}"
                    class="w-28 ml-3.5 h-23"
                    alt="" /></a>
        </div>
        <div
            class="flex w-1/2 text-amber-100 font-bold p-4 justify-center items-center">
            <h1>Order any greocory you need now!</h1>
        </div>
        <div class="flex p-4 w-1/3 justify-end items-center space-x-4">
            <div class="relative flex p-4 w-1/3 justify-end items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="white"
                    id="cart-icon"
                    class="size-10 mr-6 cursor-pointer"
                    onclick="toggleCart()">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>

                <!-- Badge -->
                <span
                    class="absolute top-3 right-6 bg-red-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                    {{ isset($cart) ? $cart->items->count() : 0 }}
                </span>
                <!-- Cart Dropdown Panel -->
                <div id="cart-panel"
                    class="hidden absolute mr-20  z-50 right-0 mt-40 w-80 max-h-96 bg-white rounded-xl shadow-lg ring-1 ring-black ring-opacity-5 overflow-y-auto flex flex-col">
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-3 text-gray-800">Your Cart</h3>

                        @if(isset($cart) && $cart->items->count())
                        @foreach($cart->items as $item)
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center space-x-2">
                                <img src=" assets/{{ $item->product->image }}" alt=""
                                    class="w-10 h-10 object-cover rounded" />
                                <div>
                                    <p class="text-sm font-medium text-gray-700">{{ $item->product->name }}</p>
                                    <p class="text-xs text-gray-500">Qty: {{ $item->quantity }}</p>
                                </div>
                            </div>
                            <span class="text-sm text-gray-600">
                                {{ $item->product->price }}$
                            </span>
                            <form method="post" action="{{ route('item.destroy', $item->product_id) }}">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="bg-red-500 rounded text-white px-4 py-2 mt-2 hover:bg-red-700">Delete</button>
                            </form>
                        </div>

                        @endforeach
                        @else
                        <p class="text-sm text-gray-500">Your cart is empty.</p>
                        @endif
                    </div>
                    <div class="mt-auto p-4">
                        <a href="/checkout"
                            class="block w-full text-center bg-customgreen text-white font-semibold py-2 px-4 rounded-lg hover:opacity-90">
                            Checkout
                        </a>
                    </div>
                </div>
            </div>
            @auth
            <h3 class="text-amber-100 max-w-30">Welcome {{ auth()->user()->first_name }} </h3>
            <div class="relative inline-block text-left">
                <!-- Avatar button -->
                <button id="user-menu-button" type="button"
                    class="flex items-center focus:outline-none"
                    onclick="toggleProfile()">
                    <img
                        src="assets/{{ auth()->user()->profile_picture }}"
                        alt="Guest Avatar Logged In"
                        class="w-12 h-12 rounded-full cursor-pointer" />
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown-menu"
                    class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-2xl">
                        Profile
                    </a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
            @else
            <div class="relative inline-block text-left">
                <!-- Avatar button -->
                <button id="user-menu-button" type="button"
                    class="flex items-center focus:outline-none"
                    onclick="toggleProfile()">
                    <img
                        src="https://www.gravatar.com/avatar/?d=mp&s=200"
                        alt="Guest Avatar Logged In"
                        class="w-12 h-12 rounded-full cursor-pointer" />
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown-menu"
                    class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 z-49 ">

                    <a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-2xl">
                        Register
                    </a>
                    <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-2xl">
                        Login
                    </a>
                </div>
            </div>
            @endauth
        </div>
    </div>
    <main>
        {{ $slot }}
    </main>
</body>
<script>
    function toggleProfile() {
        const menu = document.getElementById('dropdown-menu');
        menu.classList.toggle('hidden');
    }
    let cartOpen = false

    function toggleCart() {
        const cartPanel = document.getElementById('cart-panel');
        cartOpen = !cartOpen;

        console.log(cartOpen)
        if (cartOpen) {
            cartPanel.classList.remove('hidden');
            cartPanel.classList.add('animate-fade-in-left')
        } else {
            cartPanel.classList.remove('animate-fade-in-left')
            setTimeout(() => {
                cartPanel.classList.add('animate-fade-out-right');
            }, 50); // Match this duration with your animation duration
            setTimeout(() => {
                cartPanel.classList.add('hidden');
                cartPanel.classList.remove('animate-fade-out-right');
            }, 600);

            // Match this duration with your animation duration
        }


    }

    document.addEventListener('click', function(event) {
        const menu = document.getElementById('dropdown-menu');
        const button = document.getElementById('user-menu-button');
        if (!menu.contains(event.target) && !button.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });
    document.addEventListener('click', function(event) {
        const cartPanel = document.getElementById('cart-panel');
        const cartButton = document.getElementById('cart-icon');
        if (!cartPanel.contains(event.target) && cartOpen && !cartButton.contains(event.target)) {
            toggleCart()

            // Match this duration with your animation duration

        }
    });
</script>

</html>