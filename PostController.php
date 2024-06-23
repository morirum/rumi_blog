<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create([
            'post_title' => $request->post_title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('home')->with('success', 'Post created successfully.');

        

    }

    public function index()
    {
        $posts = Post::with('user')->get();
        return view('home', compact('posts'));
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        // Postu güncellemek için yetki kontrolü
        if ($post->user_id != Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized access.');
        }

        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Postu güncellemek için yetki kontrolü
        if ($post->user_id != Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'post_title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update([
            'post_title' => $request->post_title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('home')->with('error', 'Post not found.');
        }

        if ($post->user_id == Auth::id()) {
            $post->delete();
            return redirect()->route('home')->with('success', 'Post deleted successfully.');
        }

        return redirect()->route('home')->with('error', 'You are not authorized to delete this post.');
    }
}

