<x-guest-layout>
    <div class="mb-6">
        <span class="badge bg-brand-50 text-brand-700">Admin Panel</span>
        <h1 class="mt-3 font-display text-2xl font-bold text-slate-900">Selamat datang kembali 👋</h1>
        <p class="mt-1 text-sm text-slate-500">Silakan masukkan email dan kata sandi untuk mengakses sistem.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        {{-- Email --}}
        <div>
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   placeholder="Masukan Email Anda"
                   class="form-input @error('email') border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
            @error('email')<p class="form-error">{{ $message }}</p>@enderror
        </div>

        {{-- Password --}}
        <div x-data="{ show: false }">
            <div class="flex items-center justify-between">
                <label for="password" class="form-label">Password</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-medium text-brand-600 hover:text-brand-700">Lupa password?</a>
                @endif
            </div>
            <div class="relative">
                <input id="password" :type="show ? 'text' : 'password'" name="password" required autocomplete="current-password"
                       placeholder="••••••••"
                       class="form-input pr-11 @error('password') border-red-400 focus:border-red-500 focus:ring-red-500 @enderror">
                <button type="button" @click="show = ! show" tabindex="-1"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 transition hover:text-slate-600"
                        :aria-label="show ? 'Sembunyikan password' : 'Tampilkan password'">
                    <x-icon name="eye" class="h-5 w-5" x-show="! show" />
                    <x-icon name="eye-off" class="h-5 w-5" x-show="show" x-cloak />
                </button>
            </div>
            @error('password')<p class="form-error">{{ $message }}</p>@enderror
        </div>

        {{-- Remember --}}
        <label for="remember_me" class="flex cursor-pointer items-center gap-2 text-sm text-slate-600">
            <input id="remember_me" type="checkbox" name="remember"
                   class="h-4 w-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500">
            Ingat saya
        </label>

        <button type="submit" class="btn-primary w-full py-3">
            Masuk <x-icon name="arrow-right" class="h-4 w-4" />
        </button>
    </form>

    {{-- Demo credentials hint --}}
    <div class="mt-6 rounded-xl border border-dashed border-slate-300 bg-slate-50 p-3 text-center text-xs text-slate-500">
        Akun demo — <span class="font-semibold text-slate-700">admin@efea.id</span> / <span class="font-semibold text-slate-700">password</span>
    </div>
</x-guest-layout>
