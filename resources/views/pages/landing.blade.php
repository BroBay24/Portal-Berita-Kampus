@extends('layouts.app')

@section('title', 'Kabar Kampus | Portal Berita Ukdc')

@section('content')
    <!-- Swiper Banner -->
    <div class="swiper mySwiper mt-6 mb-10 px-4 lg:px-14">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
                @if ($banner->news)
                    <div class="swiper-slide">
                        <a href="{{ route('news.show', $banner->news->slug) }}" class="block">
                            <div class="relative h-72 lg:h-96 rounded-2xl overflow-hidden bg-gray-900">
                                <img src="{{ asset('storage/' . $banner->news->thumbnail) }}" alt="{{ $banner->news->title }}" class="absolute inset-0 w-full h-full object-contain">
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-x-0 bottom-0 h-full bg-gradient-to-t from-[rgba(0,0,0,0.6)] to-[rgba(0,0,0,0)] pointer-events-none"></div>
                                <div class="relative flex flex-col gap-1 justify-end p-3 h-full">
                                
                                <!-- Content -->
                                <div class="relative z-10 mb-3 px-4">
                                    <!-- Category -->
                                    @if ($banner->news->newsCategory)
                                        <div class="bg-primary text-white text-xs rounded-2xl w-fit px-3 py-1 font-normal">
                                            {{ $banner->news->newsCategory->title }}
                                        </div>
                                    @endif

                                    <!-- Title -->
                                    <p class="text-2xl lg:text-4xl font-bold text-white mt-2 line-clamp-2">
                                        {{ $banner->news->title }}
                                    </p>

                                    <!-- Author -->
                                    @if ($banner->news->author && $banner->news->author->avatar)
                                        <div class="flex items-center gap-2 mt-3">
                                            <img src="{{ asset('storage/' . $banner->news->author->avatar) }}" alt="Author Avatar"
                                                class="w-6 h-6 rounded-full border border-white">
                                            <p class="text-white text-sm font-medium">{{ $banner->news->author->name }}</p>
                                        </div>
                                    @endif
                                </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Berita Unggulan Section -->
    <section class="px-4 md:px-10 lg:px-14 py-12 bg-gray-50">
        <div class="mb-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 text-center lg:text-left">
                Berita Unggulan Universitas
            </h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($featured as $featured)
                <a href="{{ route('news.show', $featured->slug) }}" class="group">
                    <div class="h-full border border-gray-200 rounded-2xl overflow-hidden hover:border-primary hover:shadow-lg transition duration-300">
                        <!-- Image Container -->
                        <div class="relative h-40 overflow-hidden bg-gray-200">
                            <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt="{{ $featured->title }}"
                                class="w-full h-full object-contain group-hover:scale-105 transition duration-300">
                            <div class="absolute top-3 left-3 bg-primary text-white text-xs px-3 py-1 rounded-2xl">
                                {{ $featured->newsCategory->title }}
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-4">
                            <p class="font-bold text-base text-gray-900 line-clamp-2 group-hover:text-primary transition">
                                {{ $featured->title }}
                            </p>
                            <p class="text-slate-500 text-sm mt-2">
                                {{ \Carbon\Carbon::parse($featured->created_at)->format('d F Y') }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Berita Terbaru Section -->
    <section class="px-4 md:px-10 lg:px-14 py-12">
        <div class="mb-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 text-center lg:text-left">
                Berita Terbaru
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- Berita Utama -->
            @if (isset($news[0]))
            <div class="lg:col-span-7 lg:row-span-3">
                <a href="{{ route('news.show', $news[0]->slug) }}" class="group block h-full">
                    <div class="h-full border border-gray-200 rounded-2xl overflow-hidden hover:border-primary hover:shadow-lg transition duration-300">
                        <div class="relative h-96 overflow-hidden bg-gray-200">
                            <img src="{{ asset('storage/' . $news[0]->thumbnail) }}" alt="{{ $news[0]->title }}"
                                class="w-full h-full object-contain group-hover:scale-105 transition duration-300">
                            <div class="absolute top-4 left-4 bg-primary text-white text-sm px-4 py-2 rounded-lg">
                                {{ $news[0]->newsCategory->title }}
                            </div>
                        </div>
                        
                        <div class="p-5">
                            <p class="font-bold text-xl text-gray-900 line-clamp-2 group-hover:text-primary transition">
                                {{ $news[0]->title }}
                            </p>
                            <p class="text-gray-600 text-sm mt-3 line-clamp-3">
                                {!! \Str::limit($news[0]->content, 100) !!}
                            </p>
                            <p class="text-slate-500 text-sm mt-4">
                                {{ \Carbon\Carbon::parse($news[0]->created_at)->format('d F Y') }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endif

            <!-- Berita Kecil -->
            <div class="lg:col-span-5 flex flex-col gap-5">
                @foreach ($news->skip(1)->take(3) as $new)
                    <a href="{{ route('news.show', $new->slug) }}" class="group">
                        <div class="border border-gray-200 rounded-lg overflow-hidden hover:border-primary hover:shadow-md transition duration-300 p-4 flex gap-4">
                            <div class="relative w-32 h-24 flex-shrink-0 bg-gray-200 rounded overflow-hidden">
                                <img src="{{ asset('storage/' . $new->thumbnail) }}" alt="{{ $new->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                <div class="absolute top-2 left-2 bg-primary text-white text-xs px-2 py-1 rounded">
                                    {{ $new->newsCategory->title }}
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-sm text-gray-900 line-clamp-2 group-hover:text-primary transition">
                                    {{ $new->title }}
                                </p>
                                <p class="text-slate-500 text-xs mt-2">
                                    {{ \Carbon\Carbon::parse($new->created_at)->format('d F Y') }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Author Section -->
    <section class="px-4 md:px-10 lg:px-14 py-12 bg-gray-50">
        <div class="mb-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 text-center lg:text-left">
                Penulis Terbaik
            </h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @foreach ($authors as $author)
                <a href="{{ route('author.show', $author->username) }}" class="group">
                    <div class="h-full flex flex-col items-center border border-gray-200 rounded-lg p-6 hover:border-primary hover:shadow-lg transition duration-300 text-center">
                        <!-- Avatar -->
                        <div class="mb-4">
                            @if ($author->avatar)
                                <img src="{{ asset('storage/' . $author->avatar) }}" alt="{{ $author->name }}" 
                                    class="w-20 h-20 lg:w-24 lg:h-24 rounded-full object-cover border-2 border-primary group-hover:scale-110 transition duration-300">
                            @else
                                <div class="w-20 h-20 lg:w-24 lg:h-24 rounded-full bg-gradient-to-br from-primary to-pink-500 flex items-center justify-center text-white text-xl font-bold">
                                    {{ strtoupper(substr($author->name, 0, 1)) }}
                                </div>
                            @endif
                        </div>

                        <!-- Info -->
                        <p class="font-bold text-sm lg:text-base text-gray-900 group-hover:text-primary transition line-clamp-2">
                            {{ $author->name }}
                        </p>
                        <p class="text-slate-500 text-xs mt-1">
                            {{ $author->News->count() }} {{ $author->News->count() === 1 ? 'Berita' : 'Berita' }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Pilihan Redaksi Section -->
    <section class="px-4 md:px-10 lg:px-14 py-12">
        <div class="mb-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 text-center lg:text-left">
                Pilihan Redaksi
            </h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($news as $choice)
                <a href="{{ route('news.show', $choice->slug) }}" class="group">
                    <div class="h-full border border-gray-200 rounded-lg overflow-hidden hover:border-primary hover:shadow-lg transition duration-300">
                        <!-- Image Container -->
                        <div class="relative h-48 overflow-hidden bg-gray-200">
                            <img src="{{ asset('storage/' . $choice->thumbnail) }}" alt="{{ $choice->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            <div class="absolute top-3 left-3 bg-primary text-white text-xs px-3 py-1 rounded-lg">
                                {{ $choice->newsCategory->title }}
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-4">
                            <p class="font-bold text-base text-gray-900 line-clamp-2 group-hover:text-primary transition">
                                {{ $choice->title }}
                            </p>
                            <p class="text-slate-500 text-sm mt-3">
                                {{ \Carbon\Carbon::parse($choice->created_at)->format('d F Y') }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Footer CTA -->
    <section class="px-4 md:px-10 lg:px-14 py-12 bg-gradient-to-r from-white via-blue-50 to-blue-400 text-center">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl lg:text-3xl font-bold mb-4 text-gray-900">Jadilah Bagian Dari Komunitas Kabar Kampus</h2>
            <p class="text-gray-700 mb-6 max-w-2xl mx-auto">
                Bagikan berita, pengalaman, dan cerita menarikmu di Universitas. Login sebagai penulis sekarang.
            </p>
            <a href="{{ route('login') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold shadow-lg hover:bg-blue-700 transition duration-300">
                Daftar sebagai Penulis
            </a>
        </div>
    </section>
@endsection
