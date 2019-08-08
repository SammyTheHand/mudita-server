@extends('layouts.form')

@section('content')
<div class="flex min-h-screen max-h-screen">
    <div class="flex flex-col justify-center content-center w-2/5">
        <div>
            <h1 class="text-3xl font-light text-center">Forgot Your Password?</h1>
            <p class="text-lg font-hairline text-gray-600 text-center">Don't worry, it happens to us all.</p>
            @if (session('status'))
                <div class="text-center text-brand-green mt-4 text-base" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}" class="px-16 mt-16">
                @csrf
                <div>
                    <label for="email" class="text-sm mb-2">Email</label>
                    <div class="mb-4">
                        <input  id="email" 
                                type="email" 
                                class="border rounded p-2 text-xs w-full @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}"
                                placeholder="user@example.com" 
                                required autocomplete="email" 
                                autofocus>
                        @error('email')
                            <span class="text-red-600 text-xs" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-full bg-brand-green text-white text-base px-4 py-2 rounded shadow">
                        Reset Password
                    </button>
                </div>
                @if (Route::has('login'))
                    <div class="mt-4">
                        <a class="text-sm font-light text-brand-green underline" href="/login">
                            Back
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
    <div class="bg-brand-green w-3/5 max-h-full">
       
    </div>
</div>
@endsection
