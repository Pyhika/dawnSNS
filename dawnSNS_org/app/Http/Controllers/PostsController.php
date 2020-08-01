<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\EditPost;
use App\Models\User;
use App\Models\Post;
use App\Models\Follow;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $items = Post::with('user')->get();
        return view('posts.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post){
        $user = auth()->user();
        $data = $request->all();
        $validator = Validator::make($data, [
            'post' => ['required', 'string', 'max:140']
        ]);

        $validator->validate();
        $post->postStore($user->id, $data);
        
        return redirect('posts');
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    editアクションはpostの編集用画面を表示させる。
    public function edit(Post $post){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    updateアクションはarticleを編集後、送信ボタンをクリックしその内容を送信した後にarticlesテーブルに編集されたデータを格納するために行われる。そのためHTTPメソッドはPOSTとなる。
    public function update(EditPost $request, Post $post){
        //
        $user = auth()->user();
        //配列
        $id = $request->input('id');
        $data = $request->input('newPost');
        
        $post->postUpdate($user->id, $post->id, $data);
        
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    送信内容の削除
    public function destroy(Post $post){
        //
        $user = auth()->user();
        $post->postDestroy($user->id, $post->id);
        
//        return redirect('posts');と同じ
        return back();
    }
}
