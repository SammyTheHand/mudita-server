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
    <body class="bg-gray-100">
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
        <main>
            <div class="flex">
                <div class="hidden lg:block lg:w-1/2 lg:py-12 lg:px-4">
                    <img src="/assets/image/mudita-multi-fence.png">
                </div>
                <div class="px-8 py-4 max-w-md mx-auto sm:max-w-xl lg:max-w-full lg:w-1/2 lg:py-32 lg:px-8">
                    <img class="lg:hidden" src="/assets/image/mudita-multi-fence.png">
                    <h1 class="font-nunito text-5xl font-bold leading-none">Create Immersive Events.</h1>
                    <h2 class="font-nunito text-lg font-semibold mt-1 mb-8 sm:mb-6 lg:mt-2">Mudita makes it radically easy to create, promote and measure the impact of <span class="text-brand-green">city wide events.</span></h2>
                    <div class="flex flex-wrap lg:flex-no-wrap content-center lg:mt-12">
                        <div class="w-full lg:w-auto">
                            <a href="/promotion" class="align-middle px-5 py-4 text-xl rounded-lg shadow-lg bg-brand-green hover:bg-teal-700 text-white font-nunito focus:outline-none focus:shadow-outline">Watch the demo</a> 
                        </div>
                        <div class="mt-10 w-full lg:w-auto lg:mt-0 lg:ml-4">
                            <a href="/register" class="align-middle px-5 py-4 text-xl rounded-lg shadow-lg bg-brand-green hover:bg-teal-700 text-white font-nunito focus:outline-none focus:shadow-outline">Sign up for free</a>
                        </div>

                    </div>
                </div>            
            </div>
        </main>   
    </body>
</html>
