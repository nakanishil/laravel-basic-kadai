<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index() {
        // postsテーブルから全てのデータを取得、変数$postsに代入
        $posts = DB::table('posts') -> get();

        return view('posts.index', compact('posts'));
    }
}
