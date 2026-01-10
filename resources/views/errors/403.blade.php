@extends('layouts.app')

@section('title', 'Akses Ditolak')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-2xl mx-auto text-center">
        <!-- Error Code -->
        <div class="mb-8">
            <h1 class="text-9xl font-bold text-orange-500 opacity-20">403</h1>
        </div>

        <!-- Error Message -->
        <div class="space-y-4 mb-10">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
                Akses Ditolak
            </h2>
            <p class="text-lg text-gray-600 max-w-md mx-auto">
                Anda tidak memiliki izin untuk mengakses halaman ini.
            </p>
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
            <a href="{{ route('login') }}" 
               class="inline-flex items-center justify-center px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:border-primary hover:text-primary transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
                Login
            </a>
        </div>
    </div>
</div>
@endsection
