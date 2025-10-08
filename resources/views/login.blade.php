<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="bg-lightyel px-30 bg-[url('/public/assets/abstrakciya-figury-geometriya-6475.jpg')] bg-cover bg-center min-h-screen">


    <div class="flex min-h-screen space-x-0 items-center animate-slide-up-fade">
        <div class="mr text-white  flex flex-col just-center items-center space-y-10 w-[50%] h-180 ml-40 bg-[url('/public/assets/healthy-diet-spring-food-background-assortment-fresh-raw-organic-green-vegetables-broccoli-cauliflower-zucchini-cucumbers-asparagus-spinach-avocado-cabbage-set-dark-green-background_136595-18740.avif')] bg-cover bg-center rounded-xl p-10">
            <h1 class="text-3xl mt-10 font-bold">Welcome to Greocy</h1>
            <p class="text-xl pl-10 pr-10 font-bold mt-7">We designed this website to help you order everything you that you would need out of a
                greocery store immidietly just from home with a very quick and smooth service that is super fast
                and super easy to work with.</p>
        </div>
        <div
            class="flex flex-col bg-white p-10 h-180 w-[25%] rounded-xl space-y-6 items-center justify-center">
            <a href="/">
                <img src="./assets/GREOCY-logo.png" alt="" class="w-40 h-40 rounded-2xl" />
            </a>
            <form
                class="flex flex-col py-5 space-y-5 space-x-3.5 items-center"
                action="existing_user"
                method="post">
                @csrf
                <h1>Login</h1>

                <input
                    class="w-full rounded-full border border-gray-300 px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-green-500"
                    type="email"
                    name="email"
                    id=""
                    placeholder="Email"
                    required />
                @error('email')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
                <input
                    class="w-full rounded-full border border-gray-300 px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-green-500"
                    type="password"
                    name="password"
                    id=""
                    placeholder="Password"
                    required />
                @error('password')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
                <button type="submit"
                    class="bg-green-500 w-34 h-10 rounded-full text-white hover:bg-green-800">Submit</button>
                <p class="text-sm">
                    Don't have an account?
                    <a href="/register" class="text-blue-500">Register</a>
                </p>
            </form>
        </div>
    </div>

</body>

</html>