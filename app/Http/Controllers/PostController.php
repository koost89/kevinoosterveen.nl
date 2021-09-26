<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        return view('posts.index', [
            'posts' => Post::with('tags')
                ->search(collect($request->only(['tag', 'q'])))
                ->published()
                ->orderBy('created_at')
                ->simplePaginate(10)
                ->withQueryString(),
        ]);
    }
}
