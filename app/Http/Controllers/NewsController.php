<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends Controller
{ 
    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();
        
        if (!$news) {
            abort(404, 'Berita tidak ditemukan');
        }
        
        $newest = News::orderBy('created_at', 'desc')->limit(6)->get();

        return view('pages.news.show', compact('news', 'newest'));
    }

    public function category($slug)
    {
        $category = NewsCategory::where('slug', $slug)->first();
        
        if (!$category) {
            abort(404, 'Kategori tidak ditemukan');
        }

        return view('pages.news.category', compact('category'));
    }
}
