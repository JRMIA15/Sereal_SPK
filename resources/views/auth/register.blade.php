<x-guest-layout>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Register</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ url('/') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="{{ route('register') }}">Register</a>
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
                            <h4>Already have an account?</h4>
                            <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                            <a class="primary-btn" href="{{ route('login') }}">Log In</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Create an Account</h3>
                        <form class="row login_form" action="{{ route('register') }}" method="post" id="contactForm" novalidate="novalidate">
                            @csrf
                            
                            <!-- Name -->
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required autofocus autocomplete="name">
                                @error('name')
                                    <span class="text-danger mt-1 d-block text-left" style="font-size: 13px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" required autocomplete="username">
                                @error('email')
                                    <span class="text-danger mt-1 d-block text-left" style="font-size: 13px;">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Password -->
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required autocomplete="new-password">
                                @error('password')
                                    <span class="text-danger mt-1 d-block text-left" style="font-size: 13px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" required autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="text-danger mt-1 d-block text-left" style="font-size: 13px;">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <button type="submit" class="primary-btn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->
</x-guest-layout>
