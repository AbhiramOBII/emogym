<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    public function index()
    {
        $blogs = Blog::published()
            ->latest('published_at')
            ->paginate(9);

        return view('pages.blog', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->published()
            ->firstOrFail();

        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.blog-detail', compact('blog', 'relatedBlogs'));
    }
}
