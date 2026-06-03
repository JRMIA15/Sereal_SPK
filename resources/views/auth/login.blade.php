<x-guest-layout>
    <style>
        .auth-section {
            margin-top: 120px;
            margin-bottom: 80px;
        }
        .auth-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            border: 1px solid #edf2f7;
        }
        .auth-left {
            background: linear-gradient(135deg, #ff6c00 0%, #ffba00 100%);
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 480px;
        }
        .auth-left h2 {
            color: #ffffff;
            font-weight: 800;
            font-size: 1.8rem;
            margin-bottom: 15px;
        }
        .auth-left p {
            color: rgba(255,255,255,0.85);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 30px;
            max-width: 300px;
        }
        .auth-left .auth-switch-btn {
            border: 2px solid #fff;
            color: #fff;
            padding: 10px 30px;
            border-radius: 6px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .auth-left .auth-switch-btn:hover {
            background: #fff;
            color: #ff6c00;
        }
        .auth-right {
            padding: 50px 40px;
        }
        .auth-right h3 {
            font-weight: 700;
            color: #1a202c;
            font-size: 1.5rem;
            margin-bottom: 8px;
        }
        .auth-right .auth-subtitle {
            color: #718096;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }
        .auth-right .form-group {
            margin-bottom: 20px;
        }
        .auth-right .form-group label {
            font-weight: 600;
            color: #4a5568;
            font-size: 0.85rem;
            margin-bottom: 6px;
        }
        .auth-right .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }
        .auth-right .form-control:focus {
            border-color: #ff6c00;
            box-shadow: 0 0 0 3px rgba(255, 108, 0, 0.12);
        }
        .auth-submit-btn {
            background: linear-gradient(90deg, #ff6c00 0%, #ffba00 100%);
            color: #fff;
            border: none;
            width: 100%;
            padding: 13px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(255, 108, 0, 0.2);
        }
        .auth-submit-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(255, 108, 0, 0.35);
        }
        .auth-links {
            margin-top: 15px;
            text-align: center;
        }
        .auth-links a {
            color: #ff6c00;
            font-size: 0.85rem;
            font-weight: 500;
        }
    </style>

    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="auth-card">
                        <div class="row no-gutters">
                            <div class="col-lg-5 d-none d-lg-block">
                                <div class="auth-left">
                                    <h2>Selamat Datang!</h2>
                                    <p>Masuk ke dashboard SAW untuk mengelola data sereal dan melihat hasil rekomendasi terbaik.</p>
                                    @if (Route::has('register'))
                                        <a class="auth-switch-btn" href="{{ route('register') }}">Buat Akun Baru</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="auth-right">
                                    <h3>Login</h3>
                                    <p class="auth-subtitle">Masukkan email dan password untuk masuk ke dashboard</p>

                                    @if (session('status'))
                                        <div class="alert alert-success mb-3" role="alert" style="border-radius: 8px; font-size: 0.9rem;">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="admin@styrk.com" required autofocus autocomplete="username">
                                            @error('email')
                                                <span class="text-danger mt-1 d-block" style="font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="••••••••" required autocomplete="current-password">
                                            @error('password')
                                                <span class="text-danger mt-1 d-block" style="font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <label class="mb-0" style="font-weight: 400; font-size: 0.85rem;">
                                                <input type="checkbox" name="remember" style="margin-right: 5px;"> Ingat Saya
                                            </label>
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" style="font-size: 0.85rem; color: #ff6c00;">Lupa Password?</a>
                                            @endif
                                        </div>
                                        <button type="submit" class="auth-submit-btn">Masuk</button>
                                    </form>
                                    <div class="auth-links d-lg-none mt-3">
                                        @if (Route::has('register'))
                                            <span style="color: #718096; font-size: 0.85rem;">Belum punya akun?</span>
                                            <a href="{{ route('register') }}">Daftar di sini</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
