<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::withCount('posts')->where('role', '!=', 'admin')->get(); // если удалить админа будет сущий кошмар
        return view('admin.users', compact('users'));
    }   

    public function userPosts(User $user)
    {
        $posts = $user->posts;
        return view('admin.posts', compact('posts', 'user'));
    }

    public function destroyPost(Post $post) {
        $post->delete();
        return back();  
    }

    public function updatePost(Request $request, Post $post) {
        $data = $request->validate([
            'status' => ""
        ]);
        $post->update($data);
        return back(); 
    }

    public function destroyUser(User $user)
    {
        $user->posts()->delete();
        $user->delete();
        return redirect()->route('admin.users');
    }
}
