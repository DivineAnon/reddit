<?php

namespace App\Http\Controllers;

use App\Gadget;
use App\Thread;
use App\ThreadVote;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new Thread();
        $new->thread_key = 'TH' . Str::random(6);
        $new->created_by = Auth::user()->id;
        $updateCount = User::find(Auth::user()->id);
        $updateCount->thread_made = $updateCount->thread_made + 1;
        $updateCount->update();
        if (!empty($request['brand_id'])) {
            $new->brand_id = $request['brand_id'];
        }
        if (!empty($request['gadget_id'])) {
            $new->gadget_id = $request['gadget_id'];
            $gadget = Gadget::find($request['gadget_id']);
            $gadget->thread_count = $gadget->thread_count + 1;
            $gadget->update();
        }
        $new->title = $request['title'];
        $new->thread_type = $request['thread_type'];
        if ($request['thread_type'] == 0) {
            $new->article = $request['article'];
        } elseif ($request['thread_type'] == 1) {
            $file = $request->file('image');
            $file_enx = $file->getClientOriginalExtension();
            $namafile = "thread_" . $new->thread_key . "." . $file_enx;
            $request->file('image')->move("img/thread_images/", $namafile);
            $new->image = $namafile;
        } elseif ($request['thread_type'] == 2) {
            $new->video_embed_link = $request['video_embed_link'];
        }

        $new->save();
        return redirect()->to($request['returnTo'])->with('toast_success', 'Thread Posted!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = Thread::where('thread_key', $request['thread_key'])->first();
        $delete->vote()->delete();
        $delete->thread_report()->delete();
        $delete->delete();

        return redirect()->route('my_thread')->with('toast_success', 'Thread Deleted!');
    }

    public function hide(Request $request)
    {
        $hide = Thread::where('thread_key', $request['thread_key'])->first();
        if ($hide->show_status == 0) {
            $hide->show_status = 1;
        } elseif ($hide->show_status == 1) {
            $hide->show_status = 0;
        }
        $hide->update();

        return redirect()->route('my_thread')->with('toast_success', 'Thread is now hidden!');
    }

    public function upvote(Request $request)
    {
        $vote = new ThreadVote();
        $vote->thread_key = $request['thread_key'];
        $vote->user_id = Auth::user()->id;
        $vote->vote_status = 1;
        $vote->save();
        $thread = Thread::where('thread_key', $request['thread_key'])->first();
        $thread->up_vote = $thread->up_vote + 1;
        $thread->update();

        return back()->with('toast_success', 'Thread upvoted');
    }

    public function downvote(Request $request)
    {
        $vote = new ThreadVote();
        $vote->thread_key = $request['thread_key'];
        $vote->user_id = Auth::user()->id;
        $vote->vote_status = 2;
        $vote->save();
        $thread = Thread::where('thread_key', $request['thread_key'])->first();
        $thread->up_vote = $thread->up_vote - 1;
        $thread->update();

        return back()->with('toast_success', 'Thread downvoted');
    }
}
