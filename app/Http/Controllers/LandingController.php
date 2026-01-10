<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\News;
use App\Models\Author;

class LandingController extends Controller
{
    public function index()
    {
        try {
            $banners = Banner::all();
            $featured = News::where('is_featured', true)->limit(10)->get();
            $news = News::orderBy('created_at', 'desc')->limit(4)->get();
            $authors = Author::limit(5)->get();
     
            return view('pages.landing', compact('banners', 'featured', 'news', 'authors'));
        } catch (\Exception $e) {
            return view('pages.landing', [
                'banners' => collect([]),
                'featured' => collect([]),
                'news' => collect([]),
                'authors' => collect([])
            ]);
        }
    }
}
