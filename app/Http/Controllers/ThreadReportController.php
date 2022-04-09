<?php

namespace App\Http\Controllers;

use App\Thread;
use App\ThreadReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadReportController extends Controller
{
    /**
     * Report thread as a spam.
     *
     * @return \Illuminate\Http\Response
     */
    public function spam_report(Request $request)
    {
        $new = new ThreadReport();
        $new->thread_key = $request['thread_key'];
        $new->report_type = 0;
        $new->report_status = 0;
        $new->user_id = Auth::user()->id;
        $new->save();

        return redirect()->route('thread_detail', $request['thread_key'])->with('toast_success', 'Thread reported as spam!');
    }

    /**
     * Report thread as a inappropriate.
     *
     * @return \Illuminate\Http\Response
     */
    public function inappropriate_report(Request $request)
    {
        $new = new ThreadReport();
        $new->thread_key = $request['thread_key'];
        $new->report_type = 1;
        $new->report_status = 0;
        $new->user_id = Auth::user()->id;
        $new->save();

        return redirect()->route('thread_detail', $request['thread_key'])->with('toast_success', 'Thread reported inapproriate!');
    }

    /**
     * Report thread as for other reason.
     *
     * @return \Illuminate\Http\Response
     */
    public function other_report(Request $request)
    {
        $new = new ThreadReport();
        $new->thread_key = $request['thread_key'];
        $new->report_type = 2;
        $new->report_status = 0;
        $new->other_reason = $request['other_reason'];
        $new->user_id = Auth::user()->id;
        $new->save();

        return redirect()->route('thread_detail', $request['thread_key'])->with('toast_success', 'Thread reported!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ThreadReport::where([
            ['report_status', 0]
        ])->get();
        return view('admin.report.index', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_filter()
    {
        $data = Thread::whereDate('created_at', '=', Carbon::today())->where([
            ['show_status', 0],
        ])->orderBy('created_at')->get();
        return view('admin.filter_threads.index', compact('data'));
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
        //
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
     * Ban thread
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function ban(Request $request, $id)
    {
        $ban = ThreadReport::find($id);
        $thread = Thread::where('thread_key', $request['thread_key'])->first();
        $ban->report_status = 2;
        $ban->update();
        $thread->show_status = 2;
        $thread->update();

        return redirect()->route('reports.index')->with('toast_success', 'Thread banned!');
    }

    public function ban_thread(Request $request)
    {
        $thread = Thread::where('thread_key', $request['thread_key'])->first();
        $thread->show_status = 2;
        $thread->update();

        return redirect()->route('forum')->with('toast_success', 'Thread banned!');
    }

    /**
     * Ignore thread
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function ignore(Request $request, $id)
    {
        $ban = ThreadReport::find($id);
        $ban->report_status = 1;
        $ban->update();

        return redirect()->route('reports.index')->with('toast_success', 'Thread ignored!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
