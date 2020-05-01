<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //auth認証(ログインできているかどうか)
    //ページを読み込むとき前に、auth機能を実行させる
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    
    public function index()
    {
        $list = \DB::table('users')->get();
        return view('posts.index',['list'=>$list]);
    }
    
    //Createについて
    //insert処理
    public function create(Request $request){
        $bio = $request->input('bio');
        
        \DB::table('users')
            ->insert(['bio' => $bio]);
        return redirect('index');
    }
    
//    Updateについて
    //idを渡してform表示
    public function updateForm($id)
    {
        $post = \DB::table('users')
            ->where('id', $id)
            ->first();
        return view('posts.index', compact('post'));
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
    
    public function profile(){
        $list = \DB::table('users')->get();
        return view('users.profile',['list'=>$list]);
    }
    
    public function search(){
        return view('users.search');
    }
    
//    Deleteについて
    public function delete($id){
        
        \DB::table('users')
            ->where('id', $id)
            ->delete();
 
        return redirect('index');
    }

}
