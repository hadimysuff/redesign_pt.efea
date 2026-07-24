@props(['dark' => false])

<form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
    @csrf

    @if (session('success'))
        <div class="flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            <x-icon name="check-circle" class="h-5 w-5 shrink-0 text-green-600" />
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <label for="name" class="form-label">Nama <span class="text-red-500">*</span></label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-input" placeholder="Nama lengkap">
            @error('name')<p class="form-error">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="email" class="form-label">Email <span class="text-red-500">*</span></label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="form-input" placeholder="you@perusahaan.com">
            @error('email')<p class="form-error">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="phone" class="form-label">No. Telepon</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-input" placeholder="+62…">
            @error('phone')<p class="form-error">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="subject" class="form-label">Subjek</label>
            <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="form-input" placeholder="Perihal">
            @error('subject')<p class="form-error">{{ $message }}</p>@enderror
        </div>
    </div>

    <div>
        <label for="message" class="form-label">Pesan <span class="text-red-500">*</span></label>
        <textarea name="message" id="message" rows="5" required class="form-textarea" placeholder="Ceritakan kebutuhan Anda…">{{ old('message') }}</textarea>
        @error('message')<p class="form-error">{{ $message }}</p>@enderror
    </div>

    <button type="submit" class="btn-primary w-full px-6 py-3 sm:w-auto">
        Kirim Pesan <x-icon name="arrow-right" class="h-4 w-4" />
    </button>
</form>
