<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class=" bg-amber-50  px-30 ">

    <div class="mt-100">
        <form enctype="multipart/form-data" action="/profile/update" method="POST">
            @csrf
            <label for="profile picture">
                Enter Your profile picture
            </label>
            <input class="w-full rounded-full border-2 mt-5 border-green-500 px-4 py-2 pl-10 focus:ring- 2 focus:ring-green-500"
                type="file"
                name="profile_picture"
                id="" />
                <input name="id" type="hidden" value="{{ auth()->user()->id }}">
                <button type="submit">SUBMIT</button>
        </form>
    </div>


</body>

</html>