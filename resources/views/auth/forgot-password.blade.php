<x-guest-layout>
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="auth-card">
                        <div class="row no-gutters">
                            <div class="col-lg-5 d-none d-lg-block">
                                <div class="auth-left">
                                    <h2>Lupa Password?</h2>
                                    <p>Masukkan email Anda untuk menerima tautan reset password dan membuat password baru.</p>
                                    <a class="auth-switch-btn" href="{{ route('login') }}">Kembali ke Login</a>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="auth-right">
                                    <h3>Reset Password</h3>
                                    <p class="auth-subtitle">Kami akan mengirimkan tautan ulang ke alamat email Anda.</p>

                                    @if (session('status'))
                                        <div class="alert alert-success mb-3" role="alert" style="border-radius: 8px; font-size: 0.95rem;">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required autofocus>
                                            @error('email')
                                                <span class="text-danger mt-1 d-block" style="font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="auth-submit-btn">Kirim Tautan Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
