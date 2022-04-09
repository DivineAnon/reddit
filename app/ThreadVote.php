<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadVote extends Model
{
    protected $table = "thread_vote";
    protected $primaryKey = 'id';
    protected $fillable = ['thread_key', 'user_id', 'vote_status'];
    public $timestamps = true;

    public function thread()
    {
        return $this->belongsTo('App\Thread', 'thread_key', 'thread_key');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
