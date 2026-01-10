@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-2xl mx-auto text-center">
        <!-- Error Code -->
        <div class="mb-8">
            <h1 class="text-9xl font-bold text-primary opacity-20">404</h1>
        </div>

        <!-- Error Message -->
        <div class="space-y-4 mb-10">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
                Halaman Tidak Ditemukan
            </h2>
            <p class="text-lg text-gray-600 max-w-md mx-auto">
                Maaf, halaman yang Anda cari tidak ditemukan atau telah dipindahkan.
            </p>
            @if(isset($exception) && $exception->getMessage())
                <p class="text-sm text-gray-500 italic">{{ $exception->getMessage() }}</p>
            @endif
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('landing') }}" 
               class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white font-semibold rounded-lg hover:bg-opacity-90 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Kembali ke Beranda
            </a>
            <button onclick="window.history.back()" 
                    class="inline-flex items-center justify-center px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:border-primary hover:text-primary transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Halaman Sebelumnya
            </button>
        </div>

        <!-- Popular Categories -->
        <div class="mt-16 pt-10 border-t border-gray-200">
            <p class="text-sm text-gray-500 mb-4">Atau jelajahi kategori berita:</p>
            <div class="flex flex-wrap gap-2 justify-center">
                @foreach(\App\Models\NewsCategory::limit(5)->get() as $category)
                    <a href="{{ route('category.show', $category->slug) }}" 
                       class="px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-full hover:bg-primary hover:text-white transition">
                        {{ $category->title }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
