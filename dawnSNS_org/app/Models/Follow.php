<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    const UPDATED_AT = null;
    
    protected $fillable = [
        'follow_id',
        'follower_id',
    ];
    
    protected $primaryKey = [
        'follow_id',
        'follower_id',
    ];
    
    public function followingIds(Int $user_id){
        return $this->where('follow_id', $user_id)->get('follower_id');
    }
}
