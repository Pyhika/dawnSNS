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
}
