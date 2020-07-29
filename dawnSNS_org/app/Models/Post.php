<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    protected $fillable = [
        'post'
    ];
    
     // 一覧画面
    public function getTimeLines(Int $user_id, Array $follow_ids){
        // 自身とフォローしているユーザIDを結合する
        $follow_ids[] = $user_id;
        return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate(50);
    }
    
    public function getData(){
        return $this->id .': ' . $this->post.'( ' . $this->user->username .') '; 
    }
    
    // 投稿機能（保存）
    public function postStore(Int $user_id, Array $data){
        $this->user_id = $user_id;
        $this->post = $data['post'];
        $this->save();

        return;
    }
    
    // 編集機能
    public function getEditPost(Int $user_id, Int $post_id){
        return $this->where('user_id', $user_id)->where('id', $post_id)->first();
    }
    
    public function postUpdate(Int $user_id, Array $data){
        $this->id->$post_id;
        $this->text->$data['text'];
        $this->update();
        return;
    }
    
    //削除機能
    public function postDestroy(Int $user_id, Int $post_id){
        return $this->where('user_id', $user_id)
                    ->where('id', $post_id)
                    ->delete();
    }
}
