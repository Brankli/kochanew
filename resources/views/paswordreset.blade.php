<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>investment website</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body >
         <div class="flex items-center justify-center min-h-screen">
        <div class="w-full bg-white rounded-lg shadow-2xl  md:mt-0 sm:max-w-md xl:p-0 ">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight">
                    Reset password
                </h1>
                <form  action="{{url('resetpassword')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input class="hidden" type="text" name="id" value="{{$token}}">
                    <div class="mb-4">
                        <label for="new" class="block mb-2 text-sm font-medium text-gray-900">New Password</label>
                        <input type="password" name="newpassword" id="new"
                            class="bg-gray-50 border border-sky-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 outline-none"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="confirmedpassword" class="block mb-2 text-sm font-medium text-gray-900">confirm Password</label>
                        <input type="password" name="confirmedpassword" id="new"
                            class="bg-gray-50 border border-sky-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 outline-none"
                            required>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 w-5xl focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block">Change
                        Password</button>
            </form>
        </div>
    </div>
</div>
    </body>
</html>
