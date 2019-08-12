@extends('layouts.form')

@section('content')
<div class="flex min-h-screen max-h-screen">
    <div class="flex flex-col justify-center content-center w-2/5">
        <div>
            <h1 class="text-3xl font-light text-center">Resetting your password?</h1>
            <p class="text-lg font-hairline text-gray-600 text-center">We always forget ours too!</p>
            <div class="flex justify-center">
                <a class="text-xs text-brand-green underline mt-2" href="/login">Remembered it? Login.</a>
            </div>
            <form method="POST" action="{{ route('password.update') }}" class="px-16 mt-16">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-4">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                    <div>
                        <input  id="email" 
                                type="email" 
                                class="border rounded p-2 text-xs w-full @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ $email ?? old('email') }}"
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
                <div class="mb-4">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-6">
                        <input  id="password" 
                                type="password" 
                                class="border rounded p-2 text-xs w-full @error('password') is-invalid @enderror" name="password"
                                placeholder="Password" 
                                required autocomplete="new-password">
                        @error('password')
                            <span class="text-red-600 text-xs" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                    <div class="col-md-6">
                        <input  id="password-confirm" 
                                type="password" 
                                class="border rounded p-2 text-xs w-full" 
                                name="password_confirmation" 
                                placeholder="Password" 
                                required autocomplete="new-password">
                    </div>
                </div>
                    <div>
                        <button type="submit" class="w-full bg-brand-green text-white text-base px-4 py-2 rounded shadow">
                            Reset
                        </button>
                    </div>
            </form>
        </div>
    </div>
    <div class="bg-brand-green w-3/5 max-h-full flex flex-col justify-center">
        <div class="p-12">
            <img src="/assets/image/mudita-login.png">
        </div>     
    </div>
</div>
@endsection
