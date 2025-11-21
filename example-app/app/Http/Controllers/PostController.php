<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function create(){
        return view('post.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([//validate([...])が追加されると$errorsが動くよ
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);//validationルールに外れると、ここで処理中止returnに飛ぶよ

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        $post = Post::create($validated);

        $request->session()->flash('message', '保存しました');

        return back();
    }
    //
}
