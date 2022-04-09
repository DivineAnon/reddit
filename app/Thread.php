<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Thread extends Model
{
    use Searchable;
    protected $table = "thread";
    protected $primaryKey = 'id';
    protected $fillable = ['thread_key', 'created_by', 'brand_id', 'gadget_id', 'title', 'tags', 'thread_type', 'article', 'image', 'video_embed_link', 'up_vote', 'down_vote'];
    public $timestamps = true;

    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id', 'id');
    }

    public function gadget()
    {
        return $this->belongsTo('App\Gadget', 'gadget_id', 'id');
    }

    public function vote()
    {
        return $this->hasMany('App\ThreadVote', 'thread_key', 'thread_key');
    }

    public function thread_report()
    {
        return $this->hasMany('App\ThreadReport', 'thread_key', 'thread_key');
    }

    public function getVoteStatusAttribute($user_id)
    {
        $getVote = ThreadVote::where([
            ['thread_key', $this->thread_key],
            ['user_id', $user_id],
        ])->count();
        if ($getVote == 0) {
            $status = 'not_yet';
        } else {
            $status = 'voted';
        }
        return $status;
    }

    public function getVoteAttribute()
    {
        $vote = 0;
        $upvote = ThreadVote::where([
            ['thread_key', $this->thread_key],
            ['vote_status', 1]
        ])->count();
        $downvote = ThreadVote::where([
            ['thread_key', $this->thread_key],
            ['vote_status', 2]
        ])->count();
        $vote = $upvote - $downvote;
        return $vote;
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        // Applies Scout Extended default transformations:
        $array = $this->transform($array);

        return $array;
    }
}
