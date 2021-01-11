@extends('layouts.admin')

@section('content')
<div class="">
	<div class="container rounded border p-3 shadow-sm bg-white" style="margin-top:7vh;width:35%">
		<div class="p-3">
			<div class="">
				<form method="POST" action="{{route('register')}}">
					@csrf
					<h2 class="pb-3 text-center">Register</h2>

					<div>
						<input id="name" type="name" placeholder="Name" class="input100 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
						@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
                    <br>
                    <div>
						<input id="email" type="email" placeholder="Email" class="input100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
                    <br>
					<div>
						<input id="password" placeholder="Password" type="password" class="input100 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
                    <br>
					<div>
						<input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    
					<div class="mt-4">
						<button class="btn btn-primary w-100">
							Register
						</button>
					</div>
				</form>

				<div class="text-center mt-5">
					<span class="">already have an account? <a href="{{route('login')}}">Login</a></span>
				</div>
			</div>
		</div>
	</div>
@endsection
