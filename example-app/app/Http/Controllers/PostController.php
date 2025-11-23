<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function create(){
        return view('post.create');
    }

    public function store(Request $request) {
        Gate::authorize('test');

        $validated = $request->validate([//validate([...])が追加されると$errorsが動くよ
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);//validationルールに外れると、ここで処理中止returnに飛ぶよ

        $validated['user_id'] = auth() -> id();

        // $post = Post::create([
        //     'title' => $request->title,
        //     'body' => $request->body
        // ]);
        //黄本p.197で登場。その後バリデーションの項6-3P.203で上段「コードを追加します」と書かれているが
        //「以下のように書き換えます」と読み替えた方がよさそう。
        //ただし文脈理解上'$request->session()->flash('message', '保存しました');'が含まれていないので
        //「追加」なのか「書換」なのかがあいまい。
        //その後7－2リレーションの設定方法でModelを書き換えたときP.220に、3項目に保存項目が増えるが
        //このコード部分に限っては、2項しか無いため、'user_id'の値が無い、とエラーになってしまう
        //バリデーションの部分P.203の時に書き換えてしまう方が良い

        $post = Post::create($validated);

        $request->session()->flash('message', '保存しました');

        return back();
    }

    public function index() {
        // $posts=Post::all();
        //これはuser_idしか送られない。あとでViewがuserの値を参照しに行かなきゃいけない
        $posts=Post::with('user') -> get();//Eager(積極的な)ロード
        //user_idだけじゃなくて、リレーションされたuserの値もセットで$postsに格納する//軽くする工夫

        // $posts = Post::where('user_id', '!=', auth() -> id()) -> get();//データ絞り込み例
        return view('post.index', compact('posts'));
    }
    //
}
