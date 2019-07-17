<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mudita</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <header class="flex justify-between font-nunito bg-gray-900 px-8 py-2">
            <a href="/" class="font-nunito text-brand-green text-4xl mx-6">Mudita</a>
           @if (Route::has('login'))
                <div class="flex flex-col justify-center mx-6">
                    @auth
                    <div>
                        <a href="{{ url('/home') }}" class="text-center text-white hover:text-brand-green px-2">Dashboard</a>
                    </div>
                    @else
                    <div class="flex justify-center items-center">
                        <div>
                            <a href="{{ route('login') }}" class="text-center text-white hover:text-brand-green px-2">Login</a>
                        </div>
                        @if (Route::has('register'))
                        <div>
                            <a href="{{ route('register') }}" class="text-center text-white hover:text-brand-green px-2">Register</a>
                        </div>
                        @endif
                    </div>
                    @endauth
                </div>
            @endif 
        </header>
        <main class="px-8 bg-gray-200 h-screen">
            <div class="flex py-6">
                <div class="w-1/2">
                    <img src="/assets/image/mudita-multi-fence.png">
                </div>
                <div class="w-1/2 ml-8">
                    <h1 class="font-nunito text-6xl font-bold leading-none">Create Immersive Events.</h1>
                    <h2 class="font-nunito text-lg mt-4 mb-12">Mudita makes it radically easy to create, promote and measure the impact of city wide events.</h2>
                    <div flex flex-col>
                        <a href="/register" class="align-middle mr-5 px-5 py-4 text-xl rounded-lg shadow-lg bg-brand-green hover:bg-teal-700 text-white font-nunito focus:outline-none focus:shadow-outline">Sign up for free</a>
                        <a href="/promotion" class="align-middle mr-5 px-5 py-4 text-xl rounded-lg shadow-lg bg-brand-green hover:bg-teal-700 text-white font-nunito focus:outline-none focus:shadow-outline">Watch the demo</a> 
                    </div>
                </div>
            </div> 
        </main>   
    </body>
</html>
