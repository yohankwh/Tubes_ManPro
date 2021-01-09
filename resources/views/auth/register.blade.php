@extends('layouts.app')

@section('content')
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                <form method="POST" action="{{route('register')}}" class="login100-form validate-form">
                    @csrf
					<span class="login100-form-title p-b-33">
						Register
					</span>

					<div class="wrap-input100 validate-input" >
						<!-- <input class="input100" type="text" name="email" placeholder="Email"> -->
						<input id="name" type="name" placeholder="Name" class="input100 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
						@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
						
					</div>
                    <br>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<!-- <input class="input100" type="text" name="email" placeholder="Email"> -->
						<input id="email" type="email" placeholder="Email" class="input100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
						
					</div>

                    <br>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input id="password" placeholder="Password" type="password" class="input100 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
                    
                    <br>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                            <input id="password-confirm" type="password" class="input100 form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    
					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Register
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
