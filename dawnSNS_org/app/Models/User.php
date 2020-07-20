<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'bio',
        'images',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
//第一引数で参照するテーブルを指定するが、今回は同一テーブルなので自身のテーブルになる。第二引数には中間テーブルとなるfollowsテーブルを指定。
//    followers()はフォローされているユーザIDから、フォローしているユーザIDにアクセスする。
    public function followers(){
        return $this->belongsToMany(self::class, 'follows', 'follower_id', 'follow_id');
    }
    
//    follows()はフォローしているユーザIDから、フォローされているユーザIDにアクセスする。
    public function follows(){
        return $this->belongsToMany(self::class, 'follows', 'follow_id', 'follower_id');
    }
    
    public function getAllUsers(Int $user_id){
        return $this->Where('id', '<>', $user_id)->paginate(20);
    }
    
        // フォローする
    public function follow(Int $user_id) 
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id) 
    {
        return (boolean) $this->follows()->where('follow_id', $user_id)->first(['id']);
    }

    // フォローされているか
    public function isFollowed(Int $user_id) 
    {
        return (boolean) $this->followers()->where('follower_id', $user_id)->first(['id']);
    }
}
