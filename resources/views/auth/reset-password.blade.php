<x-guest-layout>
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="auth-card">
                        <div class="row no-gutters">
                            <div class="col-lg-5 d-none d-lg-block">
                                <div class="auth-left">
                                    <h2>Ubah Password</h2>
                                    <p>Masukkan password baru untuk mengamankan akun Anda setelah reset.</p>
                                    <a class="auth-switch-btn" href="{{ route('login') }}">Kembali ke Login</a>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="auth-right">
                                    <h3>Reset Password</h3>
                                    <p class="auth-subtitle">Gunakan form berikut untuk menyimpan password baru Anda.</p>

                                    <form method="POST" action="{{ route('password.store') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" placeholder="Masukkan email">
                                            @error('email')
                                                <span class="text-danger mt-1 d-block" style="font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password Baru</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="Masukkan password baru">
                                            @error('password')
                                                <span class="text-danger mt-1 d-block" style="font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation">Konfirmasi Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password">
                                        </div>

                                        <button type="submit" class="auth-submit-btn">Reset Password</button>
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
