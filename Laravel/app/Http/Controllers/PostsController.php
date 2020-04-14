<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //auth認証(ログインできているかどうか)
    //ページを読み込むとき前に、auth機能を実行させる
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //helloメソッドを追加しました
    public function hello()
    {
        echo 'hello world!<br>';
        echo 'コントローラーから';
    }
    
//    indexメソッドを追加しました
    public function index()
    {
        $list = \DB::table('posts')->get();
        return view('posts.index',['list'=>$list]);
    }
    
//    Createについて
    //formの表示
    public function createForm()
    {
        return view('posts.createForm');
    }
    
    //create処理
    public function create(Request $request)
    {
        $post = $request->input('newPost');
        
        \DB::table('posts')
            ->insert(['post' => $post]);
 
        return redirect('index');
    }
    
//    Updateについて
    //idを渡してform表示
    public function updateForm($id)
    {
        $post = \DB::table('posts')
            ->where('id', $id)
            ->first();
        return view('posts.updateForm', compact('post'));
    }
    
    //update処理
    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        
        \DB::table('posts')
            ->where('id', $id)
            ->update(['post' => $up_post]);

        return redirect('index');
    }
    
//    Deleteについて
        public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();
 
        return redirect('index');
    }
    
}
