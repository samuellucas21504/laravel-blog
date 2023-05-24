<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getPostsPage()
    {
        $posts = Post::where('is_active', '=', '1')->latest()->get();
        return view('posts', compact('posts'));
    }

    public function getCreatePostPage() {

        return view('createPost');
    }

    public function getPostPage(Post $post) {
        return view('post', ['post' => $post]);
    }

    public function createPost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:25',
            'body' => 'required|max:256'
        ]);

        $validated['title'] = strip_tags($validated['title']);
        $validated['body'] = strip_tags($validated['body']);
        $validated['user_id'] = Auth::id();

        Post::create($validated);

        return redirect('/posts')->with('success', 'Post created!');
    }

    public function getUpdatePostPage(Post $post)
    {
        return view('updatePost', compact('post'));
    }

    public function editPost(Post $post, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:25',
            'body' => 'required|max:256'
        ]);

        $post['title'] = strip_tags($validated['title']);
        $post['body'] = strip_tags($validated['body']);

        $post->save();

        return redirect('/posts')->with('success', 'Post atualizado com sucesso!');
    }

    public function deletePost(Post $post)
    {
        $post->delete();

        return redirect('/posts')->with('success', 'Post deleted successfully!');
    }
}
