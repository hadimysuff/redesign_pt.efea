<x-public-layout title="Layanan">
    <x-page-banner title="Layanan Kami"
                   subtitle="Solusi teknologi informasi menyeluruh untuk mendukung transformasi dan pertumbuhan bisnis Anda."
                   :breadcrumb="[['label' => 'Layanan']]" />

    <section class="bg-white py-20 lg:py-24">
        <div class="container-x">
            @if ($services->isNotEmpty())
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($services as $service)
                        <x-service-card :service="$service" />
                    @endforeach
                </div>
            @else
                <p class="text-center text-slate-400">Belum ada layanan yang dipublikasikan.</p>
            @endif
        </div>
    </section>

    <x-cta-banner />
</x-public-layout>
