<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','content','users_id'];
    public function coments(){
        return $this->hasMany('App\Comment');
    }
    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
