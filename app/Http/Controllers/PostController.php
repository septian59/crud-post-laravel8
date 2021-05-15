<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{




    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        $posts = Post::where('category_id', $post->category_id)->latest()->limit(5)->get();
        return view('posts.show', compact('post', 'posts'));
    }

    public function create()
    {
        return view('posts.create', [
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function store(Request $request)
    {
        // cara ke 1 membuat post

        // $post = new Post();
        // $post->title = $request->title;
        // $post->slug = Str::slug($request->title);
        // $post->body = $request->body;
        // $post->save();
        // return redirect()->to('/post/create');


        //validasi post
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'array|required',
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if (request()->file('thumbnail')) {
            $slug = Str::slug($request->title);

            $thumbnail = request()->file('thumbnail');
            $thumbnailUrl =  $thumbnail->storeAs("images/posts", "{$slug}.{$thumbnail->extension()}");
        } else {
            $thumbnailUrl = null;
        }



        // cara ke 2 membuat post
        $post = auth()->user()->posts()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'category_id' => $request->category,
            'thumbnail' => $thumbnailUrl,

        ]);

        $post->tags()->attach(request('tags'));

        session()->flash('success', 'Post berhasil di simpan');
        return back();
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function update(Post $post)
    {
        request()->validate([
            'title' => 'required|min:3',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'array|required',
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);


        if (request()->file('thumbnail')) {
            Storage::delete($post->thumbnail);

            $slug = Str::slug(request()->title);

            $thumbnail = request()->file('thumbnail');
            $thumbnailUrl =  $thumbnail->storeAs("images/posts", "{$slug}.{$thumbnail->extension()}");
        } else {
            $thumbnailUrl = $post->thumbnail;
        }



        $post->update([
            'title' => request()->title,
            'body' => request()->body,
            'category_id' => request()->category,
            'thumbnail' => $thumbnailUrl,
        ]);

        $post->tags()->sync(request('tags'));

        session()->flash('success', 'Post berhasil di update');
        return redirect('post');
    }

    public function destroy(Post $post)
    {


        if (auth()->user()->is($post->author)) {
            Storage::delete($post->thumbnail);
            $post->tags()->detach();
            $post->delete();
            session()->flash('success', 'Post berhasil di delete');
            return redirect('post');
        } else {
            session()->flash('error', 'Post ini bukan punya anda');
            return redirect('post');
        }
    }
}
