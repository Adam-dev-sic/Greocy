<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')

</head>

<body class=" bg-black px-30 bg-[url('/public/assets/YAULDFAAXt13xTx5.jpeg')] ">

    <div class="flex min-h-screen items-center justify-center animate-bounce-fade-in">
        <div
            class="flex bg-gray-100 p-10 rounded-xl w-350 h-180 space-y-6 space-x-10  items-center">
            <form
                class="flex flex-col ml-30 py-5 space-y-8 space-x-3.5 "
                action="{{ route('products.add') }}"
                method="post"
                enctype="multipart/form-data">
                @csrf
                <h1 class="text-2xl font-bold text-black ">Add Product</h1>
                <div class="flex space-x-10">
                    <div>
                        <label class="text-lg ml-2 font-bold" for="Product picture">Product Name:</label>

                        <input
                            class="w-full rounded-full border border-gray-300 px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-green-500"
                            type="text"
                            name="name"
                            id=""
                            placeholder="Name"
                            required />
                        @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>

                        <label class="text-lg ml-2 font-bold" for="Product picture">Product Price:</label>

                        <input
                            class="w-full rounded-full border border-gray-300 px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-green-500"
                            type="number"
                            name="price"
                            id=""
                            step="0.01"
                            placeholder="Price"
                            required />
                        @error('price')

                        <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex ml-15 space-x-10">
                    <div class="flex flex-col w-55 space-y-2">
                        <label class="text-lg ml-2 font-bold" for="Product picture">Select Quantity</label>
                        <div class="relative">
                            <select id="quantity" name="quantity"
                                class="w-full appearance-none rounded-2xl border shadow-2xl border-gray-300 bg-white px-4 py-3 pr-10 text-gray-800 text-base shadow-sm focus:border-green-300 focus:ring-2 focus:ring-green-500 transition-all">
                                <option value="1kg">1kg</option>
                                <option value="100g">100g</option>
                                <option value="1piece">1piece</option>
                            </select>
                            <!-- custom dropdown icon -->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute right-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-500 pointer-events-none"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col w-55 space-y-2">
                        <label class="text-lg ml-2 font-bold" for="tag">Select Quantity</label>
                        <div class="relative">

                            <select id="tag" name="tag"
                                class="w-full appearance-none rounded-2xl border shadow-2xl border-gray-300 bg-white px-4 py-3 pr-10 text-gray-800 text-base  focus:border-green-300 focus:ring-2 focus:ring-green-500 transition-all">
                                <option value="Fruits">Fruits</option>
                                <option value="Vegetables">Vegetables</option>
                                <option value="Poultry and meat">Poultry and meat</option>
                                <option value="Fish">Fish</option>
                                <option value="Bakery">Bakery</option>
                                <option value="Others">Others</option>
                            </select>
                            @error('tag')
                            <div class="text-red-500 text-sm">{{ $message }}</div>

                            @enderror
                            <!-- custom dropdown icon -->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="absolute right-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-500 pointer-events-none"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>
                <label class="text-lg  font-bold" for="Product picture">Product Picture:</label>
                <input class="w-full rounded-full border-2 -mt-5 border-green-500 px-4 py-2 pl-10 focus:ring- 2 focus:ring-green-500"
                    type="file"
                    name="image"
                    id=""

                    required />
                @error('image')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
                <input type="hidden" name="admin_id" id="" value="{{ auth()->user()->id }}">

                <button type="submit" class="bg-green-500 w-34 h-10 rounded-full text-white hover:bg-green-800">Submit</button>
            </form>

            <div class="flex justify-center items-center flex-shrink-0 overflow-hidden w-70 ml-30 h-70 border-8 border-green-500 rounded-full">
                <a href="/">
                    <img src="/assets/GREOCY-logo.png" class="w-full h-full  object-cover object-center" alt="">
                </a>
            </div>
        </div>
    </div>


</body>

</html>