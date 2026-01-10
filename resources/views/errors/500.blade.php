@extends('layouts.app')

@section('title', 'Terjadi Kesalahan')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-2xl mx-auto text-center">
        <!-- Error Code -->
        <div class="mb-8">
            <h1 class="text-9xl font-bold text-red-500 opacity-20">500</h1>
        </div>

        <!-- Error Message -->
        <div class="space-y-4 mb-10">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
                Terjadi Kesalahan Server
            </h2>
            <p class="text-lg text-gray-600 max-w-md mx-auto">
                Maaf, terjadi kesalahan pada server. Tim kami sedang memperbaikinya.
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
            <button onclick="location.reload()" 
                    class="inline-flex items-center justify-center px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:border-primary hover:text-primary transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Coba Lagi
            </button>
        </div>
    </div>
</div>
@endsection
