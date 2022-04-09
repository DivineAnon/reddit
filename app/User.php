<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'image', 'thread_made', 'thread_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute()
    {
        if (empty($this->image) || $this->image == null) {
            $pic = 'img/user.svg';
        } else {
            $pic = 'img/profile_picture/' . $this->image;
        }
        return $pic;
    }

    public function getThreadCount()
    {
        $data = Thread::where('created_by', $this->id)->count();
        return $data;
    }

    public function getUpvoteCount()
    {
        $data = ThreadVote::where([
            ['user_id', $this->id],
            ['vote_status', 1]
        ])->count();
        return $data;
    }

    public function getDownvoteCount()
    {
        $data = ThreadVote::where([
            ['user_id', $this->id],
            ['vote_status', 2]
        ])->count();
        return $data;
    }

}
