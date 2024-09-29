<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class AdminPostController extends Controller
{
    public function edit(Post $post)
    {

        return view('admin.posts.edit', ['post' => $post]);

    }

    public function update(Request $request, Post $post)
    {

        $validated_data = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'content' => ['required', 'min:10']
        ]);

        $post->update($validated_data);

        return to_route('admin', ['post' => $post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        
        return to_route('admin');
    }
}
