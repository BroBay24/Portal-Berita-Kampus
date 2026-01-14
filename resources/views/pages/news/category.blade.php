@extends('layouts.app')

@section('title', $category?->title ?? 'Kategori')

@section('content')

@if($category)
    <div class="w-full mb-16 bg-[#F6F6F6]">
      <h1 class="text-center font-bold text-2xl p-24">{{ $category->title }}</h1>
    </div>

    <div class=" flex flex-col gap-5 px-4 lg:px-14">
      <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4">
        @foreach ($category->news ?? [] as $news)

        <a href="{{ route('news.show', $news->slug) }}" class="block">
          <div class="border border-slate-200 p-3 rounded-2xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out">
            <div class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal ml-2 mt-2 text-sm absolute">
              {{ $news->newsCategory->title }} </div>
            <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="" class="w-full rounded-2xl mb-3 bg-gray-100"
            style="height:200px; object-fit:contain;">
            <p class="font-bold text-base mb-1">{{ $news->title }}</p>
            <p class="text-slate-400">{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}</p>
          </div>
        </a>
        @endforeach
      </div>
    </div>
@else
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Kategori Tidak Ditemukan</h2>
            <a href="{{ route('landing') }}" class="text-primary hover:underline">Kembali ke Beranda</a>
        </div>
    </div>
@endif

@endsection