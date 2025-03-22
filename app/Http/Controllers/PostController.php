<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index($userId) {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.users');
        }

        $currentUser = Auth::user();
        if($currentUser->id != $userId) {
            abort(403, 'У вас нет доступа к этому ресурсу.');
        }

        $user = User::findOrFail($userId);
        $posts = $user->posts;
        return view('posts.index', compact('posts', 'user')); 
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        $post = Auth::user()->posts()->create($validated);
        return redirect()->route('post.index', ['id' => Auth::id()]);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
    
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        $post->update($validated);
        return redirect()->route('post.index', ['id' => Auth::id()]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('post.index', ['id' => Auth::id()]);
    }
}