@extends('layouts.form')

@section('content')
<div class="flex min-h-screen max-h-screen">
    <div class="flex flex-col justify-center content-center w-2/5">
        <div>
            <h1 class="text-3xl font-light text-center">Sign Up</h1>
            <p class="text-lg font-hairline text-gray-600 text-center">Create city wide events.</p>
            <div class="flex justify-center">
                <a class="text-xs text-brand-green underline mt-2" href="/login">Already have an account? Sign in.</a>
            </div>
            <form method="POST" action="{{ route('register') }}" class="px-16 mt-16">
                @csrf
                <div class="mb-6">
                    <label class="text-sm mb-2" for="name">Name</label>
                    <div class="control">
                        <input  id="name"
                                type="text"
                                class="border rounded p-2 text-xs w-full{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="John Doe" 
                                required
                                autofocus>
                        @if ($errors->has('name'))
                            <span role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="mb-6">
                    <label class="text-sm mb-2" for="email">Email</label>
                    <div class="control">
                        <input  id="email"
                                type="email"
                                class="border rounded p-2 text-xs w-full{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="user@example.com" 
                                required>
                        @if ($errors->has('email'))
                            <span role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="mb-6">
                    <label class="text-sm mb-2" for="password">Password</label>
                    <div>
                        <input  id="password"
                                type="password"
                                class="input border border-muted-light rounded p-2 text-xs w-full{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password"
                                placeholder="Password" 
                                required>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="text-sm mb-2" for="password-confirmation">Confirm Password</label>
                    <div>
                        <input  id="password-confirmation"
                                type="password"
                                class="border rounded p-2 text-xs w-full"
                                name="password_confirmation"
                                placeholder="Password" 
                                required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="control">
                    <button type="submit" class="w-full bg-brand-green text-white text-base px-4 py-2 rounded shadow">START YOUR FREE TRIAL</button>
                </div>
            </form>
        </div>
    </div>
    <div class="bg-brand-green w-3/5 max-h-full">
       
    </div>
</div>
@endsection
