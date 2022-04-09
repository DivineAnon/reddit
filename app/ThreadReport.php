<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadReport extends Model
{
    protected $table = "thread_report";
    protected $primaryKey = 'id';
    protected $fillable = ['thread_key', 'report_type', 'other_reason', 'report_status'];
    public $timestamps = true;

    public function thread()
    {
        return $this->belongsTo('App\Thread', 'thread_key', 'thread_key');
    }
}
