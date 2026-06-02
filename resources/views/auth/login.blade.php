<x-guest-layout>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Login/Register</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ url('/') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('login') }}">Login/Register</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="{{ asset('assets/img/login.jpg') }}" alt="">
                        <div class="hover">
                            <h4>New to our website?</h4>
                            <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                            @if (Route::has('register'))
                                <a class="primary-btn" href="{{ route('register') }}">Create an Account</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Log in to enter</h3>
                        
                        @if (session('status'))
                            <div class="alert alert-success mb-4 text-center" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="row login_form" action="{{ route('login') }}" method="post" id="contactForm" novalidate="novalidate">
                            @csrf
                            
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" required autofocus autocomplete="username">
                                @error('email')
                                    <span class="text-danger mt-1 d-block text-left" style="font-size: 13px;">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required autocomplete="current-password">
                                @error('password')
                                    <span class="text-danger mt-1 d-block text-left" style="font-size: 13px;">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <div class="creat_account text-left">
                                    <input type="checkbox" id="f-option2" name="remember">
                                    <label for="f-option2">Keep me logged in</label>
                                </div>
							</div>
							
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Log In</button>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                                @endif
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
</x-guest-layout>
