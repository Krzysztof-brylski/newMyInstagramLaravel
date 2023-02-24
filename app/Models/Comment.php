<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    private $filable=[
      'content'
    ];
    protected $visible=[
      'content'
    ];
    protected $with = ['Answers'];
    protected $withCount = ['Likes'];
    public function Author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function Likes(){
        return $this->morphMany(Likes::class,'likeable');
    }

    public function Answers(){
        return $this->morphMany(Comment::class,'commentable');
    }

    public function Commentable(){
        return $this->morphTo(Comment::class);
    }



}
