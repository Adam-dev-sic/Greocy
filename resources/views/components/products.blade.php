<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{ $slot }}

    <form method="GET" action="{{ url('/') }}" class=" mt-10">
        <!-- @if(request()->has('page'))
        <input type="hidden" name="page" value="{{ request('page') }}">
        @endif -->




        <label for="tag" class="ml-20 font-bold text-lg">Tags:</label>
        <select name="tag" id="tag"
            class="border rounded p-2 bg-orange-800 text-white hover:bg-orange-600 focus:outline-none  focus:ring-red-700 ml-2"
            onchange="this.form.submit()">
            <option value="all" {{ request('tag') === 'all' ? 'selected' : '' }}>All</option>
            @foreach($tags as $tag)
            <option value="{{ $tag }}" {{ request('tag') === $tag ? 'selected' : '' }}>
                {{ ucfirst($tag) }}
            </option>
            @endforeach
        </select>
    </form>
    <div class="flex">
        <h1 class=" text-black text-3xl font-bold ml-20 mt-20">Check out!</h1>
        @if (auth()->user()->is_admin ?? false)


        <button type="button" onclick="window.location.href='/products/add'" class="bg-red-950 rounded text-white px-3 h-12 mt-17  hover:bg-red-700 ml-300 cursor-pointer">
          Add Product
        </button>


    </div>
    @endif
    </div>
    <div id="products" class="opacity-0 flex flex-wrap w-full space-x-10 space-y-10 p-10 m-10 ">
        @foreach($products as $product)


        <span class="w-1/5 h-100 flex flex-col items-center p-4 rounded-lg shadow-lg ">
            <div class="w-48 h-48 rounded-xl overflow-hidden flex-shrink-0">
                <img src="{{ asset('assets/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-full h-full object-cover object-center" />
            </div>
            <h1 class="text-lg text-black mt-1 font-bold">{{ $product->name }}</h1>
            <div class="flex mt-5 space-x-8">
                <div class="w-18 h-18 border-4 border-green-900 rounded-full flex items-center justify-center ">
                    <h4 class="text-green-900 font-bold text-xl">
                        {{ $product->price }}$
                    </h4>
                </div>

                <div class="w-18 h-18 border-4 border-green-900 rounded-full flex items-center justify-center">
                    <h4 class="text-gray-600 font-bold text-lg">{{ $product->quantity }}</h4>
                </div>
            </div>
            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" value="1">

                <button type="submit" class="bg-customgreen rounded text-white px-4 py-2 mt-2 hover:bg-green-600">
                    Add To Cart
                </button>

            </form>

            @if (auth()->user()->is_admin ?? false)
            <div class="flex justify-end mt-2 space-x-1">

                <form action="{{ route('products.edit', $product->id) }}" method="get">
                    <button type="submit" class="bg-customgreen rounded text-white px-4 py-2  hover:bg-green-600">Edit</button>
                </form>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="mb-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 rounded text-white py-2 px-4 hover:bg-red-700">Delete</button>
                </form>
            </div>
            @endif
        </span>


        @endforeach

    </div>
</body>
<script>
    const el = document.getElementById('products');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                el.classList.remove('opacity-0');
                el.classList.add('animate-slide-up-fade');

            } else {
                // Optional: Remove the animation class if you want to reset when out of view
                // el.classList.remove('animate-slide-up-fade');
                el.classList.add('opacity-0');
                el.classList.remove('animate-slide-up-fade');
            }
        });
    }, {
        threshold: 0.05
    });


    observer.observe(el);
</script>

</html>