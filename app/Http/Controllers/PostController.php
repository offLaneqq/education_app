<?php

namespace App\Http\Controllers;


use App\Jobs\SendNewPostMailJob;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Main page
        // Get all posts

        // Use Cache for speed render page in current time
        $posts = Cache::remember('posts', 10, function () {
            sleep(4);
            return Post::paginate(6);
        });

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Add check create posts can only auth users
        if (!auth()->check()) {
            return to_route('login');
        }

        // test func
        session()->put('url.intended', url()->previous());

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // 'title' and 'content' is a name of tag input and textarea from create page
        $validated_data = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'content' => ['required', 'min:10'],
            'thumbnail' => ['required', 'image']
        ]);

        $validated_data['thumbnail'] = $request->file('thumbnail')->store('thumbnails');

        // add user_id for $validated_data
        auth()->user()->posts()->create($validated_data);

        // Create job for mail(it send letter later, not now). Read how to work dispatch
        // Use php artisan queue:work for immediately compliting all jobs
        dispatch(new SendNewPostMailJob(['email' => auth()->user()->email, 'name' => auth()->user()->name, 'title' => $validated_data['title']]));

        // return redirect()->route('posts.index');     // for return not empty page
        // return to_route('posts.index');     // another way
        return redirect(session()->get('url.intended'))->with('message', 'Post created successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        Gate::authorize('update', $post);

        $validated_data = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'content' => ['required', 'min:10'],
            'thumbnail' => ['sometimes', 'image']
        ]);

        if ($request->hasFile('thumbnail')) {
            File::delete(storage_path("app/public/" . $post->thumbnail));
            $validated_data['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }

        $post->update($validated_data);

        return to_route('posts.index')->with('message', 'Post updated successfully');
        ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        Gate::authorize('delete', $post);

        File::delete(storage_path("app/public/" . $post->thumbnail));
        $post->delete();

        return to_route('posts.index', ['post' => $post]);
    }
}
