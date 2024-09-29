<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminController extends Controller
{
    public function index() {
        $posts = Post::all();

        // return view('admin.index', ['posts' => $posts]));
        // The same do, but use compact-function
        return view('admin.index', compact('posts'));
    }
}
