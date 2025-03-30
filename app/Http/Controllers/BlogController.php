<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BlogController extends Controller
{
    public function index (): LengthAwarePaginator {
        return \App\Models\Post::paginate(25);
    }

    public function show (string $slug, string $id): RedirectResponse | Post {

        $post = \App\Models\Post::findOrFail($id);
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id'=> $post->id]);
        }

        return $post;
    }
}
