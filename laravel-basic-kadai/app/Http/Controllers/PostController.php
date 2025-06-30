<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        // postsテーブルから全てのデータを取得、変数$postsに代入
        $posts = DB::table('posts') -> get();

        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        // URL /posts/{id}のidと主キーが一致するデータをpostsテーブルから取得
        $post = Post::find($id);

        return view('posts/show', compact('post'));
    }
}
