<?php

namespace App\Http\Controllers;

use App\Focus\Modules\Blog\Model\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getBlog(Blog $blog)
    {
        $news = $blog->latest()->paginate(8);
        return view('blog', compact('news'));
    }

    public function getArticle($slug)
    {
        $new = Blog::whereSlug($slug)->first();
        if (!$new) return redirect()->back();
        return view('article', compact('new'));
    }
}
