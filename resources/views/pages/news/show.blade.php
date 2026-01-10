@extends('layouts.app')

@section('title', $news->title) 

@section('content')

  <!-- Article Content -->
  <div class="py-6 lg:py-10 px-4 md:px-6">
    <div class="max-w-5xl mx-auto grid gap-8 lg:grid-cols-12">
      
      <!-- Main Content -->
      <article class="lg:col-span-8">
        <!-- Category Badge -->
        @if ($news->newsCategory)
          <a href="{{ route('category.show', $news->newsCategory->slug) }}" 
             class="inline-block bg-primary text-white px-3 py-1 rounded text-xs font-semibold mb-3 hover:bg-opacity-90">
            {{ $news->newsCategory->title }}
          </a>
        @endif

        <!-- Title -->
        <h1 class="text-2xl lg:text-4xl font-bold text-gray-900 leading-tight mb-4">
          {{ $news->title }}
        </h1>

        <!-- Meta Info -->
        <div class="flex items-center gap-3 text-sm text-gray-600 mb-6 pb-6 border-b">
          @if ($news->author)
            <a href="{{ route('author.show', $news->author->username) }}" class="flex items-center gap-2 hover:text-primary">
              @if ($news->author->avatar)
                <img src="{{ asset('storage/' . $news->author->avatar) }}" alt="{{ $news->author->name }}" 
                  class="w-7 h-7 rounded-full object-cover">
              @endif
              <span class="font-medium">{{ $news->author->name }}</span>
            </a>
            <span>•</span>
          @endif
          <time>{{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}</time>
        </div>

        <!-- Thumbnail -->
        <div class="rounded-2xl overflow-hidden mb-6 bg-gray-100">
          <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" 
            class="w-full object-contain">
        </div>
        
        <!-- Content -->
        <div class="prose prose-lg max-w-none prose-headings:font-bold prose-headings:text-gray-900 prose-p:text-gray-700 prose-p:leading-relaxed prose-li:text-gray-700 prose-strong:text-gray-900 prose-a:text-primary hover:prose-a:underline prose-ul:list-disc prose-ol:list-decimal prose-img:rounded-2xl">
          {!! $news->content !!} 
        </div>

        <!-- Author Card (Compact) -->
        @if ($news->author)
          <div class="mt-10 p-5 bg-gray-50 rounded-2xl border border-gray-200">
            <p class="text-xs text-gray-500 uppercase tracking-wide mb-3">Ditulis oleh</p>
            <a href="{{ route('author.show', $news->author->username) }}" class="flex items-center gap-4 group">
              @if ($news->author->avatar)
                <img src="{{ asset('storage/' . $news->author->avatar) }}" alt="{{ $news->author->name }}" 
                  class="w-14 h-14 rounded-full object-cover border-2 border-primary">
              @else
                <div class="w-14 h-14 rounded-full bg-primary flex items-center justify-center text-white text-xl font-bold">
                  {{ strtoupper(substr($news->author->name, 0, 1)) }}
                </div>
              @endif
              <div>
                <p class="font-bold text-gray-900 group-hover:text-primary">{{ $news->author->name }}</p>
                <p class="text-sm text-gray-600 line-clamp-2">{{ $news->author->bio ?? 'Penulis berita' }}</p>
              </div>
            </a>
          </div>
        @endif
      </article>

      <!-- Sidebar -->
      <aside class="lg:col-span-4">
        <div class="sticky top-24">
          <h3 class="font-bold text-lg text-gray-900 mb-6">Berita Terkini</h3>
          
          <div class="flex flex-col gap-6">
            @foreach ($newest->take(5) as $new)
              <a href="{{ route('news.show', $new->slug) }}" class="group">
                <div class="flex gap-4">
                  <div class="relative w-32 h-24 rounded-lg overflow-hidden flex-shrink-0">
                    <img src="{{ asset('storage/' . $new->thumbnail) }}" alt="{{ $new->title }}" 
                      class="w-full h-full object-cover">
                  </div>
                  <div class="flex-1 min-w-0">
                    <p class="font-semibold text-sm text-gray-900 line-clamp-2 group-hover:text-primary leading-snug mb-2">
                      {{ $new->title }}
                    </p>
                    <p class="text-xs text-gray-500">
                      {{ \Carbon\Carbon::parse($new->created_at)->format('d M Y') }}
                    </p>
                  </div>
                </div>
              </a>
            @endforeach
          </div>
        </div>
      </aside>
    </div>
  </div>

  <!-- More Articles -->
  <section class="py-10 px-4 md:px-6 bg-gray-50 border-t">
    <div class="max-w-5xl mx-auto">
      <h2 class="font-bold text-xl text-gray-900 mb-6">Baca Juga</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        @foreach ($newest->take(3) as $article)
          <a href="{{ route('news.show', $article->slug) }}" class="group bg-white rounded-2xl overflow-hidden border border-gray-200 hover:shadow-lg transition">
            <div class="relative h-40 bg-gray-200 overflow-hidden">
              <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
            </div>
            <div class="p-4">
              <p class="font-bold text-sm text-gray-900 line-clamp-2 group-hover:text-primary mb-2">
                {{ $article->title }}
              </p>
              <p class="text-xs text-gray-500">
                {{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}
              </p>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>

@endsection