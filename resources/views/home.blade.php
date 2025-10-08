<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<x-layout :cart="$cart">

    <body class="bg-lightyel px-30">
        @if (session('error'))
        <div id="flash-error"
            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 transition-opacity duration-700 ease-in-out"
            role="alert">
            <strong class="font-bold">Error: </strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>

        <script>
            // Fade out and remove after 3 seconds
            setTimeout(() => {
                const el = document.getElementById('flash-error');
                if (el) {
                    el.style.opacity = '0';
                    setTimeout(() => el.remove(), 700); // fully remove after fade
                }
            }, 3000);
        </script>
        @endif


        <section>
            <div class="flex items-center justify-center space-x-10 mt-10 z-0 mb-10">
                <span onclick="leftToggleMenu()" class="cursor-pointer">
                    <svg class="w-10 h-10" viewBox="-19.04 0 75.803 75.803" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g id="Group_64" data-name="Group 64" transform="translate(-624.082 -383.588)">
                                <path id="Path_56" data-name="Path 56" d="M660.313,383.588a1.5,1.5,0,0,1,1.06,2.561l-33.556,33.56a2.528,2.528,0,0,0,0,3.564l33.556,33.558a1.5,1.5,0,0,1-2.121,2.121L625.7,425.394a5.527,5.527,0,0,1,0-7.807l33.556-33.559A1.5,1.5,0,0,1,660.313,383.588Z" fill="#000000"></path>
                            </g>
                        </g>
                    </svg>
                </span>

                <div>
                    <div data-slide id="1" class="animate-fade-in-right">
                        <div class="flex flex-col mt-50 ml-130 absolute">
                            <h1 class="text-white text-xl">Coupon Code!</h1>
                            <div class="flex space-x-3">
                                <input type="text" class="border rounded p-2 bg-amber-50" placeholder="Enter code" />
                                <button class="cursor-pointer text-gray-600 bg-amber-50 rounded border w-20 hover:bg-gray-300" type="submit">Validate</button>
                            </div>
                            <p class="text-white opacity-65">Up to 10% discounts on items!</p>
                        </div>

                        <img class="h-120 w-353" src="{{ asset('assets/green.jpg') }}" alt="" />

                    </div>
                    <div id="2" data-slide class="hidden">
                        <div class="flex mt-50 absolute space-x-20 ">
                            @auth

                            <div>
                                <h1 class="ml-20 text-yellow-500 font-bold text-3xl">Welcome back {{ auth()->guard()->user()->first_name }} <br> You currently have: <br> 300 Points</h1>
                                <!-- <a href="/register">
                                    <button class="flex text-black text-xl w-40 cursor-pointer bg-yellow-500 rounded h-14 items-center justify-center ml-60 hover:bg-yellow-700">


                                        <svg
                                            class="w-10 h-10"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M13 2C10.2386 2 8 4.23858 8 7C8 7.55228 8.44772 8 9 8C9.55228 8 10 7.55228 10 7C10 5.34315 11.3431 4 13 4H17C18.6569 4 20 5.34315 20 7V17C20 18.6569 18.6569 20 17 20H13C11.3431 20 10 18.6569 10 17C10 16.4477 9.55228 16 9 16C8.44772 16 8 16.4477 8 17C8 19.7614 10.2386 22 13 22H17C19.7614 22 22 19.7614 22 17V7C22 4.23858 19.7614 2 17 2H13Z" fill="#000000"></path>
                                                <path d="M3 11C2.44772 11 2 11.4477 2 12C2 12.5523 2.44772 13 3 13H11.2821C11.1931 13.1098 11.1078 13.2163 11.0271 13.318C10.7816 13.6277 10.5738 13.8996 10.427 14.0945C10.3536 14.1921 10.2952 14.2705 10.255 14.3251L10.2084 14.3884L10.1959 14.4055L10.1915 14.4115C10.1914 14.4116 10.191 14.4122 11 15L10.1915 14.4115C9.86687 14.8583 9.96541 15.4844 10.4122 15.809C10.859 16.1336 11.4843 16.0346 11.809 15.5879L11.8118 15.584L11.822 15.57L11.8638 15.5132C11.9007 15.4632 11.9553 15.3897 12.0247 15.2975C12.1637 15.113 12.3612 14.8546 12.5942 14.5606C13.0655 13.9663 13.6623 13.2519 14.2071 12.7071L14.9142 12L14.2071 11.2929C13.6623 10.7481 13.0655 10.0337 12.5942 9.43937C12.3612 9.14542 12.1637 8.88702 12.0247 8.7025C11.9553 8.61033 11.9007 8.53682 11.8638 8.48679L11.822 8.43002L11.8118 8.41602L11.8095 8.41281C11.4848 7.96606 10.859 7.86637 10.4122 8.19098C9.96541 8.51561 9.86636 9.14098 10.191 9.58778L11 9C10.191 9.58778 10.1909 9.58773 10.191 9.58778L10.1925 9.58985L10.1959 9.59454L10.2084 9.61162L10.255 9.67492C10.2952 9.72946 10.3536 9.80795 10.427 9.90549C10.5738 10.1004 10.7816 10.3723 11.0271 10.682C11.1078 10.7837 11.1931 10.8902 11.2821 11H3Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <h3> Sign up!</h3>
                                    </button> </a> -->
                            </div>
                            @else
                            <div>
                                <h1 class="ml-20 text-yellow-500 font-bold text-3xl">Sign up to start earning <br> points everytime you <br> buy items!</h1>
                                <a href="/register">
                                    <button class=" flex text-black text-xl w-40 cursor-pointer bg-yellow-500 rounded h-14 items-center justify-center ml-60 hover:bg-yellow-700">


                                        <svg
                                            class="w-10 h-10"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M13 2C10.2386 2 8 4.23858 8 7C8 7.55228 8.44772 8 9 8C9.55228 8 10 7.55228 10 7C10 5.34315 11.3431 4 13 4H17C18.6569 4 20 5.34315 20 7V17C20 18.6569 18.6569 20 17 20H13C11.3431 20 10 18.6569 10 17C10 16.4477 9.55228 16 9 16C8.44772 16 8 16.4477 8 17C8 19.7614 10.2386 22 13 22H17C19.7614 22 22 19.7614 22 17V7C22 4.23858 19.7614 2 17 2H13Z" fill="#000000"></path>
                                                <path d="M3 11C2.44772 11 2 11.4477 2 12C2 12.5523 2.44772 13 3 13H11.2821C11.1931 13.1098 11.1078 13.2163 11.0271 13.318C10.7816 13.6277 10.5738 13.8996 10.427 14.0945C10.3536 14.1921 10.2952 14.2705 10.255 14.3251L10.2084 14.3884L10.1959 14.4055L10.1915 14.4115C10.1914 14.4116 10.191 14.4122 11 15L10.1915 14.4115C9.86687 14.8583 9.96541 15.4844 10.4122 15.809C10.859 16.1336 11.4843 16.0346 11.809 15.5879L11.8118 15.584L11.822 15.57L11.8638 15.5132C11.9007 15.4632 11.9553 15.3897 12.0247 15.2975C12.1637 15.113 12.3612 14.8546 12.5942 14.5606C13.0655 13.9663 13.6623 13.2519 14.2071 12.7071L14.9142 12L14.2071 11.2929C13.6623 10.7481 13.0655 10.0337 12.5942 9.43937C12.3612 9.14542 12.1637 8.88702 12.0247 8.7025C11.9553 8.61033 11.9007 8.53682 11.8638 8.48679L11.822 8.43002L11.8118 8.41602L11.8095 8.41281C11.4848 7.96606 10.859 7.86637 10.4122 8.19098C9.96541 8.51561 9.86636 9.14098 10.191 9.58778L11 9C10.191 9.58778 10.1909 9.58773 10.191 9.58778L10.1925 9.58985L10.1959 9.59454L10.2084 9.61162L10.255 9.67492C10.2952 9.72946 10.3536 9.80795 10.427 9.90549C10.5738 10.1004 10.7816 10.3723 11.0271 10.682C11.1078 10.7837 11.1931 10.8902 11.2821 11H3Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <h3> Sign up!</h3>
                                    </button> </a>
                            </div>
                            @endauth
                            <div class="flex flex-col  -mt-110 ml-30 items-center justify-center">

                                <svg class="w-35 h-35" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M993.763 493.538v35c0 13.33-6.04 26.664-18.135 37.136-140.149 121.421-280.35 242.795-420.49 364.219-11.813 10.238-25.813 15.501-42.454 15.501v-35c16.644 0 30.641-5.265 42.454-15.501 140.142-121.424 280.335-242.802 420.49-364.218 12.095-10.473 18.135-23.801 18.135-37.137z" fill="#D34F43"></path>
                                        <path d="M30.239 528.367v-3.5-1.75-3.5-3.5-1.75-3.5-3.5-1.75-3.5-3.5-1.75-3.5c0 14.707 6.701 29.313 19.039 40.019 138.449 120.064 277.049 239.996 415.56 360.021 13.002 11.26 28.74 16.466 47.854 16.994v35c-19.108-0.528-34.852-5.734-47.854-16.994C326.325 808.382 187.725 688.45 49.277 568.386c-12.338-10.705-19.038-25.312-19.038-40.019z" fill="#D34F43"></path>
                                        <path d="M510.786 76.601c16.263 0 32.546 5.362 44.946 16.097 139.949 121.188 279.9 242.376 419.818 363.586 24.24 20.995 24.295 53.413 0.079 74.396C835.48 652.103 695.28 773.478 555.141 894.898c-11.814 10.238-25.813 15.502-42.451 15.502-19.109-0.528-34.854-5.734-47.854-16.994C326.322 773.382 187.722 653.45 49.273 533.386c-19.579-16.987-24.959-43.81-11.895-65.251 3.92-6.438 8.67-11.829 14.465-16.849 138.109-119.552 276.18-239.134 414.262-358.719 12.298-10.64 28.48-15.966 44.681-15.966z" fill="#F2B266"></path>
                                        <path d="M570.376 308.75h0.372c10.808 0.095 21.835 5.946 26.982 12.402 0.381 0.486 0.646 0.846 0.894 1.209 3.63 5.385 5.187 10.499 5.177 15.302-0.019 8.005-4.387 15.14-10.781 21.197-0.767 0.727-2.338 1.144-3.548 1.144-8.189 0.017-16.379 0.028-24.568 0.031-7.279 0.007-14.563 0.008-21.844 0.008h-1.722c-6.764 0-13.528-0.001-20.292-0.004l-21.105-0.011c-0.38 0-0.774-0.175-1.608-0.367 1.048-1.039 1.833-1.902 2.729-2.679 14.347-12.431 28.479-25.063 43.195-37.162 4.737-3.885 10.695-6.993 16.683-9.349 0.11-0.044 0.224-0.088 0.333-0.129 0.119-0.043 0.238-0.088 0.357-0.13 2.802-0.998 5.766-1.452 8.746-1.462z" fill="#EBCA9C"></path>
                                        <path d="M389.12 353.723v-16.8c0 1.512 0.072 3.037 0.213 4.569 0.584 6.2 2.5 12.309 3.83 18.569v16.8c-1.33-6.26-3.246-12.369-3.83-18.568a48.876 48.876 0 0 1-0.213-4.57z" fill="#D0723A"></path>
                                        <path d="M389.12 353.723v-16.8c0 1.512 0.072 3.037 0.213 4.569 0.584 6.2 2.5 12.309 3.83 18.569v16.8c-1.33-6.26-3.246-12.369-3.83-18.568a48.876 48.876 0 0 1-0.213-4.57z" fill="#D0723A"></path>
                                        <path d="M393.163 360.061v16.8c-1.33-6.26-3.246-12.369-3.83-18.568a49.53 49.53 0 0 1-0.213-4.569v-16.8c0 1.512 0.072 3.037 0.213 4.569 0.584 6.198 2.5 12.308 3.83 18.568" fill="#D0723A"></path>
                                        <path d="M631.102 336.954v16.8c0 6.618-1.469 13.265-4.113 19.815-0.383 0.954-0.767 1.913-1.311 3.292v-16.8c0.544-1.377 0.926-2.338 1.311-3.292 2.644-6.552 4.113-13.2 4.113-19.815z" fill="#D0723A"></path>
                                        <path d="M631.102 336.954v16.8c0 6.618-1.469 13.265-4.113 19.815-0.383 0.954-0.767 1.913-1.311 3.292v-16.8c0.544-1.377 0.926-2.338 1.311-3.292 2.644-6.552 4.113-13.2 4.113-19.815z" fill="#D0723A"></path>
                                        <path d="M631.102 336.954v16.8c0 0.911-0.029 1.827-0.085 2.741v-16.8c0.057-0.918 0.085-1.83 0.085-2.741" fill="#D0723A"></path>
                                        <path d="M631.02 339.695v16.8c-0.345 5.708-1.752 11.426-4.03 17.074-0.381 0.954-0.767 1.913-1.311 3.292v-16.8c0.544-1.377 0.927-2.338 1.311-3.292 2.278-5.648 3.685-11.367 4.03-17.074" fill="#D0723A"></path>
                                        <path d="M449.521 308.801l0.393 0.002c8.22 0.097 16.245 3.291 24.223 9.66 5.594 4.467 10.816 9.267 16.652 14.308-5.454 4.724-10.615 9.189-15.765 13.662-3.063 2.654-6.724 4.975-9.041 8.048-0.087 0.115-0.175 0.225-0.261 0.334a15.586 15.586 0 0 1-1.674 1.81c-2.8 2.57-6.147 3.555-10.139 3.626-0.16 0.003-0.32 0.003-0.481 0.003a34.999 34.999 0 0 1-2.618-0.109 115.178 115.178 0 0 0-4.649-0.272c-1.034-0.036-2.074-0.06-3.116-0.067H442.034a83.504 83.504 0 0 0-3.436 0.088c-1.307 0.06-2.605 0.149-3.897 0.279-0.363 0.034-0.718 0.06-1.063 0.072-0.174 0.006-0.343 0.012-0.51 0.012-0.317 0-0.525-0.004-0.732-0.013-4.201-0.181-6.906-2.192-9.539-5.24-4.629-5.349-6.818-11.503-6.796-17.54 0.037-10.063 6.229-19.804 17.563-24.963a48.615 48.615 0 0 1 2.321-0.982c0.234-0.092 0.472-0.187 0.707-0.272 4.271-1.597 8.474-2.415 12.629-2.444l0.24-0.002z" fill="#EBCA9C"></path>
                                        <path d="M502.278 383.018v57.799H310.596v-57.799h191.682zM713.404 383.027v57.869H529.433v-57.869h183.971z" fill="#EAC86F"></path>
                                        <path d="M323.105 463.995v16.8h-30.863c-7.388 0-8.294-0.76-8.294-7.034v-16.8c0 6.274 0.905 7.034 8.294 7.034h30.863z" fill="#D0723A"></path>
                                        <path d="M323.105 463.995v16.8h-30.863c-7.388 0-8.294-0.76-8.294-7.034v-16.8c0 6.274 0.905 7.034 8.294 7.034h30.863z" fill="#D0723A"></path>
                                        <path d="M323.105 463.995v16.8h-30.863c-7.388 0-8.294-0.76-8.294-7.034v-16.8c0 6.274 0.905 7.034 8.294 7.034h30.863" fill="#D0723A"></path>
                                        <path d="M740.044 457.692v16.8c0 5.161-1.326 6.293-7.333 6.303-2.591 0.003-5.174 0.003-7.788 0.003-5.22 0-10.545-0.003-16.177-0.003v-16.8c5.629 0 10.954 0.003 16.177 0.003 2.611 0 5.197 0 7.788-0.003 6.004-0.01 7.333-1.143 7.333-6.303z" fill="#D0723A"></path>
                                        <path d="M740.044 457.692v16.8c0 5.161-1.326 6.293-7.333 6.303-2.591 0.003-5.174 0.003-7.788 0.003-5.22 0-10.545-0.003-16.177-0.003v-16.8c5.629 0 10.954 0.003 16.177 0.003 2.611 0 5.197 0 7.788-0.003 6.004-0.01 7.333-1.143 7.333-6.303z" fill="#D0723A"></path>
                                        <path d="M740.044 457.692v16.8c0 0.462-0.01 0.89-0.03 1.29v-16.8c0.02-0.4 0.03-0.829 0.03-1.29M740.012 458.981v16.8c-0.094 1.57-0.389 2.674-1.03 3.438v-16.8c0.641-0.764 0.936-1.867 1.03-3.438M738.98 462.418v16.8a3.047 3.047 0 0 1-0.725 0.63v-16.8a3.06 3.06 0 0 0 0.725-0.63" fill="#D0723A"></path>
                                        <path d="M738.257 463.048v16.8c-0.24 0.154-0.51 0.286-0.813 0.398v-16.8c0.303-0.112 0.573-0.243 0.813-0.398M737.443 463.446v16.8a7.89 7.89 0 0 1-1.646 0.38v-16.8a7.738 7.738 0 0 0 1.646-0.38" fill="#D0723A"></path>
                                        <path d="M735.798 463.828v16.8c-0.856 0.116-1.882 0.166-3.09 0.167-2.591 0.003-5.174 0.003-7.788 0.003-5.22 0-10.545-0.003-16.176-0.003v-16.8c5.628 0 10.953 0.003 16.176 0.003 2.611 0 5.197 0 7.788-0.003 1.211-0.003 2.232-0.051 3.09-0.167" fill="#D0723A"></path>
                                        <path d="M682.188 464.22v71.26H529.506v-71.26h152.682z" fill="#EBCA9C"></path>
                                        <path d="M732.95 360.061c5.751 0 7.091 1.163 7.091 6.086 0.013 30.51 0.013 61.027 0 91.547 0 5.161-1.326 6.293-7.333 6.303-2.591 0.002-5.174 0.002-7.788 0.002l-16.176-0.002v195.925c0 5.849-1.069 6.799-7.631 6.799h-370.44c-6.442 0-7.57-0.968-7.57-6.497V469.372v-5.377h-30.864c-7.388 0-8.296-0.76-8.296-7.036 0-30.256 0-60.514 0.009-90.768 0-4.987 1.311-6.129 7.045-6.129H393.16c-1.331-6.26-3.246-12.369-3.83-18.569-2.278-24.329 13.778-46.403 39.877-53.268 7.331-1.924 14.514-2.943 21.469-2.943 14.938-0.001 28.834 4.7 40.984 15.245 5.91 5.115 11.696 10.334 18.356 16.237 6.967-6.233 13.274-12.083 19.827-17.712 10.359-8.908 25.431-13.744 40.857-13.744 22.939 0 46.668 10.691 56.892 34.574 5.168 12.082 4.334 24.651-0.606 36.891-0.381 0.954-0.767 1.913-1.311 3.292h5.141c34.043-0.004 68.082-0.004 102.134-0.004z m-50.784 283.691v-84.845H529.442v84.845h152.724m-179.788 0V558.9H349.677v84.852h152.701m-191.78-202.934H502.28v-57.799H310.598v57.799m371.59 94.661v-71.26H529.504v71.26h152.684m-332.632-71.171v71.067h152.795v-71.067H349.556m363.848-23.413v-57.866H529.431v57.866h183.973M499.94 360.034l21.104 0.011c6.764 0.003 13.528 0.006 20.292 0.006h1.718a22736.195 22736.195 0 0 0 46.415-0.04c1.21 0 2.78-0.418 3.549-1.142 6.394-6.058 10.767-13.193 10.78-21.199 0.01-4.805-1.546-9.919-5.176-15.304a18.373 18.373 0 0 0-0.795-1.084c-5.247-6.583-16.273-12.432-27.081-12.527l-0.271-0.001c-3.08 0.012-6.043 0.465-8.852 1.468-0.119 0.042-0.237 0.087-0.355 0.13l-0.335 0.129c-5.985 2.357-11.942 5.462-16.681 9.349-14.717 12.1-28.85 24.732-43.195 37.162-0.896 0.777-1.682 1.641-2.729 2.68 0.837 0.188 1.229 0.362 1.612 0.362m-66.317-47.532c-11.333 5.162-17.526 14.904-17.563 24.965-0.022 6.038 2.174 12.191 6.797 17.54 2.633 3.048 5.337 5.058 9.539 5.24a14.663 14.663 0 0 0 1.243 0c0.347-0.014 0.699-0.036 1.063-0.072a73.94 73.94 0 0 1 3.897-0.28 87 87 0 0 1 3.434-0.088h1.012c1.039 0.007 2.078 0.03 3.114 0.068 1.558 0.058 3.112 0.15 4.649 0.271a33.404 33.404 0 0 0 3.1 0.106c3.995-0.072 7.337-1.056 10.139-3.626a15.39 15.39 0 0 0 1.673-1.809c0.087-0.109 0.173-0.221 0.259-0.334 2.318-3.073 5.979-5.394 9.041-8.05 5.149-4.471 10.313-8.939 15.765-13.662-5.838-5.039-11.055-9.838-16.652-14.306-7.979-6.372-16.003-9.563-24.224-9.662l-0.391-0.001-0.245 0.001c-4.152 0.029-8.355 0.845-12.63 2.443-0.234 0.088-0.47 0.179-0.707 0.27-0.359 0.145-0.721 0.29-1.078 0.441-0.408 0.176-0.82 0.356-1.235 0.545" fill="#E09944"></path>
                                        <path d="M502.351 464.308v71.067H349.557v-71.067h152.794z" fill="#EBCA9C"></path>
                                        <path d="M502.379 558.9v84.851H349.678V558.9h152.701z" fill="#FBF8D1"></path>
                                        <path d="M682.167 558.909v84.845H529.444v-84.845h152.723z" fill="#FBF8D1"></path>
                                        <path d="M708.746 659.919v16.801c0 5.85-1.068 6.797-7.63 6.797H330.677c-6.442 0-7.571-0.966-7.571-6.494v-16.801c0 5.526 1.13 6.495 7.571 6.495h370.439c6.564 0.004 7.63-0.948 7.63-6.798z" fill="#D0723A"></path>
                                        <path d="M708.746 659.919v16.801c0 5.85-1.068 6.797-7.63 6.797H330.677c-6.442 0-7.571-0.966-7.571-6.494v-16.801c0 5.526 1.13 6.495 7.571 6.495h370.439c6.564 0.004 7.63-0.948 7.63-6.798z" fill="#D0723A"></path>
                                        <path d="M708.746 659.919v16.801c0 0.639-0.012 1.22-0.043 1.747v-16.8c0.031-0.528 0.043-1.109 0.043-1.748M708.703 661.667v16.8c-0.1 1.658-0.379 2.79-1.025 3.556v-16.801c0.644-0.765 0.926-1.897 1.025-3.555M707.678 665.222v16.801c-0.19 0.226-0.415 0.42-0.672 0.585v-16.801c0.257-0.166 0.48-0.36 0.672-0.585M707.003 665.807v16.801a3.97 3.97 0 0 1-0.768 0.372v-16.8a4.06 4.06 0 0 0 0.768-0.373M706.235 666.18v16.8c-0.453 0.166-0.98 0.284-1.604 0.371V666.55c0.624-0.086 1.151-0.205 1.604-0.37" fill="#D0723A"></path>
                                        <path d="M704.636 666.546v16.8c-0.948 0.13-2.104 0.171-3.52 0.171H330.677c-6.442 0-7.571-0.966-7.571-6.494v-16.801c0 5.526 1.13 6.495 7.571 6.495h370.439c1.414 0.004 2.572-0.041 3.52-0.171" fill="#D0723A"></path>
                                    </g>
                                </svg>
                                <h1 class="text-yellow-400 text-3xl">Special Offers!</h1>
                            </div>
                            <div>
                                <h1 class="ml-20 text-yellow-500 font-bold text-3xl">Checkout our daily bundle <br>to save money on your <br> groceries! </h1>
                                <button class=" cursor-pointer" onclick="scrolldown()">
                                    <img class="w-30 h-30 ml-63" src={{ asset('./assets/shopping-svgrepo-com.svg') }} alt="">
                                </button>
                            </div>
                        </div>
                        <img class="h-120 w-353" src="{{ asset('assets/red.jpg') }}" alt="">
                    </div>
                    <div id="3" data-slide class="hidden">
                        <div class="flex mt-50 justify-center items-center absolute ">
                            <h1 class="text-white text-2xl font-bold ml-30">Thank you for using our website! <br>Make sure to invite friends <br> and get rewards from it too!</h1>
                            <h1 class="text-white text-2xl font-bold -mt-98 ">Get your referal link for rewards!</h1>
                            <div class=" flex items-center justify-center">
                                <input type="text" id="referral-link" class="border rounded p-2 w-90 h-15 bg-amber-50" value="https://greocy.com/invite/abc123" />
                                <button id="copy-btn" class="cursor-pointer text-white rounded w-20 " type="submit">

                                    <svg viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M589.3 260.9v30H371.4v-30H268.9v513h117.2v-304l109.7-99.1h202.1V260.9z" fill="#E1F0FF"></path>
                                            <path d="M516.1 371.1l-122.9 99.8v346.8h370.4V371.1z" fill="#E1F0FF"></path>
                                            <path d="M752.7 370.8h21.8v435.8h-21.8z" fill="#446EB1"></path>
                                            <path d="M495.8 370.8h277.3v21.8H495.8z" fill="#446EB1"></path>
                                            <path d="M495.8 370.8h21.8v124.3h-21.8z" fill="#446EB1"></path>
                                            <path d="M397.7 488.7l-15.4-15.4 113.5-102.5 15.4 15.4z" fill="#446EB1"></path>
                                            <path d="M382.3 473.3h135.3v21.8H382.3z" fill="#446EB1"></path>
                                            <path d="M382.3 479.7h21.8v348.6h-21.8zM404.1 806.6h370.4v21.8H404.1z" fill="#446EB1"></path>
                                            <path d="M447.7 545.1h261.5v21.8H447.7zM447.7 610.5h261.5v21.8H447.7zM447.7 675.8h261.5v21.8H447.7z" fill="#6D9EE8"></path>
                                            <path d="M251.6 763h130.7v21.8H251.6z" fill="#446EB1"></path>
                                            <path d="M251.6 240.1h21.8v544.7h-21.8zM687.3 240.1h21.8v130.7h-21.8zM273.4 240.1h108.9v21.8H273.4z" fill="#446EB1"></path>
                                            <path d="M578.4 240.1h130.7v21.8H578.4zM360.5 196.5h21.8v108.9h-21.8zM382.3 283.7h196.1v21.8H382.3zM534.8 196.5h65.4v21.8h-65.4z" fill="#446EB1"></path>
                                            <path d="M360.5 196.5h65.4v21.8h-65.4zM404.1 174.7h152.5v21.8H404.1zM578.4 196.5h21.8v108.9h-21.8z" fill="#446EB1"></path>
                                        </g>
                                    </svg></button>
                            </div>

                        </div>
                        <img class="h-120 w-353" src="{{ asset('assets/dgreen.jpg') }}" alt="">
                    </div>
                </div>
                <span onclick="rightToggleMenu()" class="cursor-pointer">
                    <svg class="w-10 h-10" viewBox="-19.04 0 75.804 75.804" xmlns="http://www.w3.org/2000/svg" fill="#241f31">

                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g id="Group_65" data-name="Group 65" transform="translate(-831.568 -384.448)">
                                <path id="Path_57" data-name="Path 57" d="M833.068,460.252a1.5,1.5,0,0,1-1.061-2.561l33.557-33.56a2.53,2.53,0,0,0,0-3.564l-33.557-33.558a1.5,1.5,0,0,1,2.122-2.121l33.556,33.558a5.53,5.53,0,0,1,0,7.807l-33.557,33.56A1.5,1.5,0,0,1,833.068,460.252Z" fill="#000000"></path>
                            </g>
                        </g>
                    </svg>
                </span>



            </div>

        </section>


        <section class="bg-lightyel py-6">


            </div>
            </div>
        </section>
        <section>
            <div class="container mx-auto">
                <!-- <div class="flex flex-col bg-lightyel p-3 items-center mt-10" id="categories">
                    <div class="p-3 flex space-x-10 justify-center"> <span class="bg-white w-53 h-60 rounded-xl"><img class="w-50 ml-2 h-50 rounded-xl" src="./assets/fruit-vegs.jpg" alt="" />
                            <h4 class="ml-10">Fruits/Vegetables</h4>
                        </span> <span class="bg-white w-53 h-60 rounded-xl"><img class="w-50 ml-2 h-50 rounded-xl" src="./assets/meat.jpg" alt="" />
                            <h4 class="ml-21">Meat</h4>
                        </span> <span class="bg-white w-53 h-60 rounded-xl"><img class="w-50 ml-2 h-50 rounded-xl" src="./assets/sea-food.jpg" alt="" />
                            <h4 class="ml-18">Sea Food</h4>
                        </span> <span class="bg-white w-53 h-60 rounded-xl"><img class="ml-2 w-50 h-50 rounded-xl" src="./assets/bakery.jpeg" alt="" />
                            <h4 class="ml-18">Bakery</h4>
                        </span> <span class="bg-white w-53 h-60 rounded-xl"><img class="ml-2 w-50 h-50 rounded-xl" src="./assets/snack.avif" alt="" />
                            <h4 class="ml-20">Snacks</h4>
                        </span> <span class="bg-white w-53 h-60 rounded-xl"><img class="ml-2 w-50 h-50 rounded-xl" src="./assets/others.jpg" alt="" />
                            <h4 class="ml-18">Others...</h4>
                        </span> </div>
                </div> -->
                <div class="flex justify-center my-6">
                    <div class="relative w-1/2">
                        <input type="text" placeholder="Search for products..." name="search" class="w-full rounded-full border border-gray-300 px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-green-500" id="searchInput" /> <!-- Search icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                        </svg>
                        <div id="productsContainer" class="hidden flex flex-wrap rounded-xl space-y-10 w-200 h-100 overflow-y-auto absolute bg-white shadow-2xl z-10 p-4
                        "></div>
                    </div>
                </div>
            </div>
            <x-products :products="$products" :tags="$tags"></x-products>

        </section>
        <div class="flex items-center font-bold justify-center mr-50">
            <div class="mt-6 p-4">
                {{ $products->appends(request()->except('page'))->links() }}

            </div>
        </div>

        <section>
            <!-- i would do it in another file but this sort of just final touches 
             to the web site filling it with couple last sections -->

            <h1 class="text-black text-3xl font-bold ml-20 mt-20">Bundles</h1>

            <div id="bundleContainer" class="bg-red-950 flex justify-center rounded-2xl mt-10 space-x-10 h-150">
                <div class="h-130 border-yellow-500  shadow-4xl items-center p rounded-2xl w-[28%] p-5 mt-10 flex flex-col space-y-10 bg-[url('/public/assets/red.jpg')] bg-cover bg-center "><img src="" alt="">
                    <h1 class="text-yellow-500 text-2xl font-bold [text-shadow:_2px_2px_2px_black]">
                        Fish Bundle!
                    </h1>
                    <h4 class="countdown text-yellow-500 text-2xl font-bold [text-shadow:_2px_2px_2px_black]">


                    </h4>
                    <button class="cursor-pointer bg-yellow-500 text-xl font-bold h-10 w-40 rounded-2xl hover:bg-yellow-600 " onclick="showDetails()">Check Details</button>
                    <h4 class="text-yellow-500 text-xl -mt-5 font-bold  [text-shadow:_2px_2px_2px_black]">Price: 34.80$</h4>
                    <button class=" cursor-pointer bg-yellow-500 text-xl font-bold h-15  shadow-2xl w-50 rounded-3xl hover:bg-yellow-600 ">Add Bundle to cart</button>
                </div>
                <div class="h-130 border-yellow-500  shadow-4xl items-center p rounded-2xl w-[28%] p-5 mt-10 flex flex-col space-y-10 bg-[url('/public/assets/red.jpg')] bg-cover bg-center "><img src="" alt="">
                    <h1 class="text-yellow-500 text-2xl font-bold [text-shadow:_2px_2px_2px_black]">
                        Fish Bundle!
                    </h1>
                    <h4 class="countdown text-yellow-500 text-2xl font-bold [text-shadow:_2px_2px_2px_black]">


                    </h4>
                    <button class=" cursor-pointer bg-yellow-500 text-xl font-bold h-10 w-40 rounded-2xl hover:bg-yellow-600 " onclick="showDetails()">Check Details</button>
                    <h4 class="text-yellow-500 text-xl -mt-5 font-bold  [text-shadow:_2px_2px_2px_black]">Price: 34.80$</h4>
                    <button class=" cursor-pointer bg-yellow-500 text-xl font-bold h-15  shadow-2xl w-50 rounded-3xl hover:bg-yellow-600 ">Add Bundle to cart</button>
                </div>
                <div class="h-130 border-yellow-500  shadow-4xl items-center p rounded-2xl w-[28%] p-5 mt-10 flex flex-col space-y-10 bg-[url('/public/assets/red.jpg')] bg-cover bg-center "><img src="" alt="">
                    <h1 class="text-yellow-500 text-2xl font-bold [text-shadow:_2px_2px_2px_black]">
                        Fish Bundle!
                    </h1>
                    <h4 class="countdown text-yellow-500 text-2xl font-bold [text-shadow:_2px_2px_2px_black]">


                    </h4>
                    <button class=" cursor-pointer bg-yellow-500 text-xl font-bold h-10 w-40 rounded-2xl hover:bg-yellow-600 " onclick="showDetails()">Check Details</button>
                    <h4 class="text-yellow-500 text-xl -mt-5 font-bold  [text-shadow:_2px_2px_2px_black]">Price: 34.80$</h4>
                    <button class="cursor-pointer bg-yellow-500 text-xl font-bold h-15  shadow-2xl w-50 rounded-3xl hover:bg-yellow-600 ">Add Bundle to cart</button>
                </div>
            </div>

        </section>

        <section>

            <div id="anouncement" class="opacity-0 flex flex-col items-start justify-center space-y-5  bg-[url('/public/assets/Dark-green-HD-desktop-background-featuring-a-clean-flat-surface-with-a-slight-sheen-emphasizing-simplicity-and-elegance.jpg')] w-380 rounded-2xl ml-11 mb-10 h-150 mt-30 ">
                <h1 class="text-4xl w-[45%] ml-30  font-bold text-amber-100 ">
                    Everything you want is within your reach with a click of a button on our website!

                </h1>
                <p class="ml-50 text-xl text-amber-100 opacity-80">Make sure to download our app too</p>
                <div class="flex space-x-0 -mt-5 ml-18">

                    <div class="flex justify-center  items-center w-70 h-30 flex-shrink-0 overflow-hidden rounded-lg">
                        <img src="assets/hd-get-it-on-google-play-button-transparent-png-70408169470949159xr9ct69w-removebg-preview.png" class="w-full h-full object-cover object-center">
                    </div>

                    <div class="flex justify-center  items-center w-70 h-30 flex-shrink-0 overflow-hidden rounded-lg">
                        <img src="assets/png-transparent-download-on-the-app-store-button-thumbnail-removebg-preview.png" class="w-full h-full object-cover object-center">
                    </div>
                </div>

            </div>
            </div>

        </section>
</x-layout>

<div id="bundleDetailsModal"
    class="fixed inset-0 bg-black/80 z-50 hidden flex items-center justify-center">
    <div class="bg-red-950 text-yellow-600 overflow-y-auto flex flex-col items-center max-h-200 justify-center rounded-2xl p-5 space-y-6 w-full max-w-lg">

        <h1 class="text-3xl [text-shadow:_2px_2px_2px_black]">Details:</h1>
        <ul class="list-disc text-xl list-inside">
            <li>2x Salmon Fillets</li>
            <li>1x Lemon</li>
            <li>1x Garlic Clove</li>
            <li>1x Olive Oil (250ml)</li>
            <li>1x Fresh Dill (bunch)</li>
            <li>1x Asparagus (bunch)</li>
            <li>1x Quinoa (200g)</li>
            <li>1x Mixed Greens (150g)</li>
            <li>1x Cherry Tomatoes (100g)</li>
            <li>1x Cucumber</li>
            <li>1x Balsamic Vinaigrette (100ml)</li>


        </ul>
        <h4 class="text-yellow-500 text-xl -mt-5 font-bold  [text-shadow:_2px_2px_2px_black]">Total Price: 34.80$</h4>
        <div class="flex justify-center items-center space-x-10">
            <button class=" cursor-pointer bg-yellow-500 text-black text-xl font-bold h-15 min-w-40 rounded-2xl hover:bg-yellow-600 ">Add Bundle to cart</button>
            <button class="cursor-pointer bg-yellow-500 text-black text-xl font-bold h-15 w-40 rounded-2xl hover:bg-yellow-600 " onclick="showDetails()">Close</button>
        </div>

    </div>
</div>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const productsContainer = document.querySelector('#productsContainer'); // your div where products live

        searchInput.addEventListener('input', function() {
            const query = this.value;

            fetch(`/search?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    // Clear & rebuild products
                    productsContainer.innerHTML = '';
                    productsContainer.classList.remove('hidden');
                    productsContainer.classList.add('animate-fade-in-down', 'animation-duration-1000', 'animation-ease-in-out');



                    if (data.length === 0) {
                        productsContainer.innerHTML = '<p class="p-4">No products found.</p>';
                        return;
                    }

                    // Populate with new products


                    data.forEach(product => {
                        productsContainer.innerHTML += `
                        <div class="flex flex-col items-center animate-pulse-fade-in justify-center mt-5 min-w-1/4 rounded h-1/2">
                        <div class= "flex justify-center rounded items-center w-32 h-32 flex-shrink-0 overflow-hidden rounded-lg">
                            <img src="assets/${product.image}" alt="${product.name}" class="w-full h-full object-cover object-center">
                            </div>
                            <h3>${product.name}</h3>
                            <p>${product.price}$</p>
                            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="${ product.id }">
                <input type="hidden" name="quantity" value="1">

                <button type="submit" class="bg-customgreen rounded text-white px-4 py-2 mt-2 hover:bg-green-600">
                    Add To Cart
                </button>
            </form>
          
                        </div>
                    `;
                    });
                })
                .catch(err => console.error(err));
        });
        document.addEventListener('click', function(event) {
            // If click is NOT inside productsContainer or searchInput
            if (
                !productsContainer.contains(event.target) &&
                !searchInput.contains(event.target)
            ) {
                productsContainer.classList.add('animate-fade-out-up')
                setTimeout(() => {
                    productsContainer.classList.add('hidden');
                    productsContainer.classList.remove('animate-fade-out-up', 'animation-duration-1000', 'animation-ease-in-out');
                }, 500); // Match this duration with your CSS animation duration

            } else if (searchInput.contains(event.target)) {
                if (searchInput.value.trim() !== '') {
                    productsContainer.classList.remove('hidden');

                }
            }
        });

    });
    let current = 0;
    const images = document.querySelectorAll('[data-slide]');

   
    
    function rightToggleMenu() {
        // images[current].classList.remove('animate-fade-in-right');
        images[current].classList.add('animate-fade-out-left');
        setTimeout(() => {
            images[current].classList.remove('animate-fade-out-left');
            images[current].classList.remove('animate-fade-out-right');
            images[current].classList.remove('animate-fade-in-left');
            images[current].classList.remove('animate-fade-in-right');
            images[current].classList.add('hidden');

        }, 500); // Match this duration with your

        setTimeout(() => {
            current = (current + 1) % images.length;
            images[current].classList.remove('hidden');
            images[current].classList.add('animate-fade-in-left');
        }, 500)
    }

    function leftToggleMenu() {
        images[current].classList.add('animate-fade-out-right');
        setTimeout(() => {
            images[current].classList.remove('animate-fade-out-right');
            images[current].classList.remove('animate-fade-out-left');
            images[current].classList.remove('animate-fade-in-left');
            images[current].classList.remove('animate-fade-in-right');

            images[current].classList.add('hidden');
        }, 500); // Match this duration with your
        setTimeout(() => {
            current = (current - 1 + images.length) % images.length;

            images[current].classList.add('animate-fade-in-right');
            images[current].classList.remove('hidden');
        }, 500)

    }

    let remainingTime = 14 * 60 * 60; // in seconds

    function updateCountdown() {
        // Compute hours/minutes/seconds
        const hours = Math.floor(remainingTime / 3600);
        const minutes = Math.floor((remainingTime % 3600) / 60);
        const seconds = remainingTime % 60;

        // Display with leading zeros
        document.querySelectorAll('.countdown').forEach(el => {
            el.textContent = 'Time Left: ' +
                `${hours.toString().padStart(2, '0')}:` +
                `${minutes.toString().padStart(2, '0')}:` +
                `${seconds.toString().padStart(2, '0')}`;
        });


        // Decrement
        if (remainingTime > 0) {
            remainingTime--;
        } else {
            clearInterval(timer); // stop when zero
            // optionally do something else here
        }
    }

    // Initial call & repeat every second
    updateCountdown();
    const timer = setInterval(updateCountdown, 1000);

    const al = document.getElementById('bundleContainer');
    const bundleObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // al.classList.remove('');
                al.classList.remove('opacity-0');
                al.classList.add('animate-slide-up-fade');
                console.log('Element is in view!');

            } else {
                // Optional: Remove the animation class if you want to reset when out of view
                // al.classList.remove('animate-slide-up-fade');
                al.classList.add('opacity-0');
                al.classList.remove('animate-slide-up-fade');
            }
        });
    }, {
        threshold: 0
    });


    bundleObserver.observe(al);

    function showDetails() {
        const bundleDetailsModal = document.getElementById('bundleDetailsModal')
        bundleDetailsModal.classList.toggle('hidden')
    }

    function scrolldown() {

        console.log('test')
        al.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });

    }
    const an = document.getElementById('anouncement')
    const anouncementObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // al.classList.remove('');
                an.classList.remove('opacity-0');
                an.classList.add('animate-pulse-fade-in');
                console.log('Element is in view!');

            } else {
                // Optional: Remove the animation class if you want to reset when out of view
                // al.classList.remove('animate-slide-up-fade');
                an.classList.add('opacity-0');
                an.classList.remove('animate-pulse-fade-in');
            }
        });
    }, {
        threshold: 0
    });

    anouncementObserver.observe(an)

    document.getElementById('copy-btn').addEventListener('click', async () => {
        const input = document.getElementById('referral-link');
        try {
            await navigator.clipboard.writeText(input.value);


        } catch (err) {
            console.error('Copy failed:', err);


        }
    });
</script>

</html>