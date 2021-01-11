@extends('layouts.admin')

@section('content')
<div class="">
	<div class="container rounded border p-3 shadow-sm bg-white" style="margin-top:18vh;width:35%">
		<div class="p-3">
			<div class="">
				<form method="POST" action="{{route('login')}}">
					@csrf
					<h4 class="pb-3 text-center">Login</h4>

					<div class="py-2">
						<div>
							<!-- <input class="input100" type="text" name="email" placeholder="Email"> -->
							<input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<br>
						<div>
							<input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="mt-4">
						<button class="btn btn-primary w-100">
							Sign in
						</button>
					</div>

					<div class="text-center mt-4">
						<span class="">Create an account? <a href="{{route('register')}}">Sign up</a></span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
