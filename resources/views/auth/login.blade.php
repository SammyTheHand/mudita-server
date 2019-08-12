@extends('layouts.form')

@section('content')
<div class="flex min-h-screen max-h-screen">
	<div class="flex flex-col justify-center content-center w-2/5">
		<div>
			<h1 class="text-3xl font-light text-center">Welcome</h1>
			<p class="text-lg font-hairline text-gray-600 text-center">It’s great to see you.</p>
			<div class="flex justify-center">
				<a class="text-xs text-brand-green underline mt-2" href="/register">Don’t have an account? Get started.</a>
			</div>
			<form method="POST" action="{{ route('login') }}" class="px-16 mt-16">
			@csrf
			<div class="mb-6">
				<label class="text-sm mb-2" for="email">Email</label>
				<div>
					<input 	id="email"
							type="email"
							class="border rounded p-2 text-xs w-full{{ $errors->has('email') ? ' is-invalid' : '' }}"
							name="email"
							value="{{ old('email') }}"
							placeholder="user@example.com" 
							required>
					@if ($errors->has('email'))
						<span class="text-red-600 text-xs" role="alert">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="mb-6">
				<label class="text-sm mb-2" for="password">Password</label>
				<div>
					<input 	id="password"
							type="password"
							class="border rounded p-2 text-xs w-full{{ $errors->has('password') ? ' is-invalid' : '' }}"
							name="password"
							placeholder="Password" 
							required>
					@if ($errors->has('password'))
						<span class="text-red-600 text-xs" role="alert">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="mb-6">
				<input 	class="form-check-input"
						type="checkbox"
						name="remember"
						id="remember"
						{{ old('remember') ? 'checked' : '' }}>
				<label class="text-sm" for="remember">
					Remember Me
				</label>
			</div>
			<div class="flex justify-center">
				<button type="submit" class="w-full bg-brand-green text-white text-base px-4 py-2 rounded shadow hover:bg-teal-700
focus:outline-none focus:shadow-outline">
					LET'S GO
				</button>
			</div>
			@if (Route::has('password.request'))
				<div class="mt-4">
					<a class="text-sm font-light text-brand-green underline" href="{{ route('password.request') }}">
						Forgot Your Password?
					</a>
				</div>
			@endif
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