<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Gadget;
use App\Thread;
use App\ThreadReport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banner = Gadget::orderBy('year_released', 'desc')->latest()->take(3)->get();
        $hot_threads = Thread::where('show_status', 0)->orderBy('up_vote', 'desc')->take(30)->paginate(10);
        return view('welcome', compact('banner', 'hot_threads'));
    }

    public function thread_page()
    {
        $latest_threads = Thread::where([
            ['thread_type', 0],
            ['show_status', 0],
        ])->latest()->take(15)->get();
        $latest_image_threads = Thread::where([
            ['thread_type', 1],
            ['show_status', 0],
        ])->latest()->take(15)->get();
        $latest_video_threads = Thread::where([
            ['thread_type', 2],
            ['show_status', 0],
        ])->latest()->take(10)->get();
        return view('all_thread', compact('latest_threads', 'latest_image_threads', 'latest_video_threads'));
    }

    public function popular_page()
    {
        $latest_threads = Thread::where([
            ['thread_type', 0],
            ['show_status', 0],
        ])->orderBy('up_vote', 'desc')->take(15)->get();
        $latest_image_threads = Thread::where([
            ['thread_type', 1],
            ['show_status', 0],
        ])->orderBy('up_vote', 'desc')->take(15)->get();
        $latest_video_threads = Thread::where([
            ['thread_type', 2],
            ['show_status', 0],
        ])->orderBy('up_vote', 'desc')->take(10)->get();
        $popular_gadget = Gadget::orderBy('thread_count', 'desc')->take(5)->get();
        $popular_user = User::orderBy('thread_made', 'desc')->take(6)->get();
        return view('popular', compact('latest_threads', 'latest_image_threads', 'latest_video_threads','popular_gadget','popular_user'));
    }

    public function my_threads_page()
    {
        $threads = Thread::where('created_by', Auth::user()->id)->latest()->paginate(15);
        return view('my_thread', compact('threads'));
    }

    public function forum_page()
    {
        $brands = Brand::all();
        return view('forum', compact('brands'));
    }

    public function brand_page($name)
    {
        $brands = Brand::where('name', $name)->first();
        if (empty($brands)) {
            return redirect()->route('forum');
        } else {
            $data = Gadget::where('brand_id', $brands->id)->orderBy('created_at', 'desc')->get();
            $threads = Thread::where([
                ['brand_id', $brands->id],
                ['show_status', 0],
            ])->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('brand', compact('brands', 'data', 'threads'));
    }

    public function gadget_page($name, $slug)
    {
        $brands = Brand::where('name', $name)->first();
        $gadget = Gadget::where('slug', $slug)->first();
        if (empty($brands)) {
            return redirect()->route('forum');
        } else {
            if (empty($gadget)) {
                return redirect()->route('brand_home', $brands->name);
            } else {
                $threads = Thread::where([
                    ['brand_id', $brands->id],
                    ['gadget_id', $gadget->id],
                    ['show_status', 0],
                ])->orderBy('created_at', 'desc')->paginate(10);
                return view('gadget', compact('brands', 'gadget', 'threads'));
            }
        }
    }

    public function thread_article_page()
    {
        $latest_threads = Thread::where([
            ['thread_type', 0],
            ['show_status', 0]
        ])->latest()->paginate(12);
        $type = 0;
        return view('thread_types', compact('latest_threads', 'type'));
    }

    public function thread_image_page()
    {
        $latest_threads = Thread::where([
            ['thread_type', 1],
            ['show_status', 0]
        ])->latest()->paginate(12);
        $type = 1;
        return view('thread_types', compact('latest_threads', 'type'));
    }

    public function thread_video_page()
    {
        $latest_threads = Thread::where([
            ['thread_type', 2],
            ['show_status', 0]
        ])->latest()->paginate(12);
        $type = 2;
        return view('thread_types', compact('latest_threads', 'type'));
    }

    public function popular_thread_article_page()
    {
        $latest_threads = Thread::where([
            ['thread_type', 0],
            ['show_status', 0]
        ])->orderBy('up_vote', 'desc')->paginate(12);
        $type = 0;
        return view('popular_thread_types', compact('latest_threads', 'type'));
    }

    public function popular_thread_image_page()
    {
        $latest_threads = Thread::where([
            ['thread_type', 1],
            ['show_status', 0]
        ])->orderBy('up_vote', 'desc')->paginate(12);
        $type = 1;
        return view('popular_thread_types', compact('latest_threads', 'type'));
    }

    public function popular_thread_video_page()
    {
        $latest_threads = Thread::where([
            ['thread_type', 2],
            ['show_status', 0]
        ])->orderBy('up_vote', 'desc')->paginate(12);
        $type = 2;
        return view('popular_thread_types', compact('latest_threads', 'type'));
    }

    public function thread_detail_page($thread_key)
    {
        $data = Thread::where('thread_key', $thread_key)->first();
        if (Auth::check()) {
            $report_status = ThreadReport::where([
                ['thread_key', $thread_key],
                ['user_id', Auth::user()->id],
                ['report_status', 0]
            ])->count();
        } else {
            $report_status = 0;
        }
        return view('thread_detail', compact('data', 'report_status'));
    }

    public function search_page()
    {
        $brands = Brand::where('name', 'like', '%' . $_GET['q'] . '%')->get();
        return view('search', compact('brands'));
    }

    public function profile_page($name) {
        $user = User::where('name', $name)->first();
        $threads = Thread::where([
            ['created_by', $user->id],
            ['show_status', 0]
        ])->latest()->paginate(15);
        return view('person_profile', compact('threads','user'));
    }

    function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = Thread::join('brand', 'thread.brand_id', '=', 'brand.id')->join('gadget', 'thread.gadget_id', '=', 'gadget.id')
                    ->select('thread.*', 'brand.name', 'gadget.name')
                    ->where('show_status', 0)
                    ->where('title', 'like', '%' . $query . '%')
                    ->orWhere('article', 'like', '%' . $query . '%')
                    ->orWhere('brand.name', 'like', '%' . $query . '%')
                    ->orWhere('gadget.name', 'like', '%' . $query . '%')
                    ->latest()
                    ->get();
            } else {
                $data = null;
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $chip_brand = "";
                    $chip_gadget = "";
                    $mid_output = "";
                    if (!empty($row->brand_id)) {
                        $chip_brand = '<a href="' . route("brand_home", $row->brand->name) . '" class="brand-chip uk-border-rounded white-text bg-gradient-noshadow" style="font-size: 13px;padding-left: 15px;padding-right: 15px;padding-top: 8px;padding-bottom: 8px;background-color: #eee;text-decoration: none">' . $row->brand->name . '</a>';
                    }
                    if (!empty($row->gadget_id)) {
                        $chip_gadget = '<a href="' . url("forum/brand/" . $row->brand->name, $row->gadget->slug) . '" class="brand-chip uk-border-rounded white-text bg-gradient-noshadow" style="font-size: 13px;padding-left: 15px;padding-right: 15px;padding-top: 8px;padding-bottom: 8px;background-color: #eee;text-decoration: none">' . $row->gadget->name . '</a>';
                    }
                    if ($row->thread_type == 0) {
                        if (!empty($row->article)) {
                            $mid_output = '<p class="grey-text-1 font-light" style="margin-top: -5px;">' . Str::limit(strip_tags($row->article), 160, '[..]') . '</p>';
                        }
                    } elseif ($row->thread_type == 1) {
                        $mid_output = '<img data-src="' . asset('img/thread_images/' . $row->image) . '" width="100%" class="z-depth-15" height="auto" uk-img style="margin-bottom: 30px;border-radius: 10px;margin-top:10px;" alt="">';
                    } elseif ($row->thread_type == 2) {
                        $mid_output = '<iframe class="z-depth-15" src="' . $row->video_embed_link . '" title="' . $row->title . '" width="100%" height="250px" style="margin-bottom: 30px;border-radius: 10px;margin-top: 10px;"></iframe>';
                    }
                    $output .= '
                                <div class="uk-width-1-2">
                                    <div
                                        class="thread-card uk-card uk-card-default uk-card-small uk-card-body z-depth-15 hoverable"
                                        style="border-radius: 10px;z-index: 15;">
                                        <div class="uk-grid" uk-grid>
                                            <div class="uk-width-1-1 uk-width-expand">
                                                <div class="uk-margin">
                                                    <p class="grey-text font-light" style="font-size: 0.9rem">Posted by
                                                        <a href="#" class="accent-color font-regular">' . $row->creator->name . '</a>
                                                        • ' . Carbon::parse($row->created_at)->diffForHumans() . '</p>
                                                    <a href="' . route("thread_detail", $row->thread_key) . '" class="grey-text-3 font-extrabold"
                                                       style="font-size: 18px;top: -15px;position:relative">' . $row->title . '</a>
                                                    ' . $mid_output . '
                                                    <div class="tags" style="margin-bottom: 10px;">
                                                         ' . $chip_brand . " " . $chip_gadget . '
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                }
            } else {
                $output = '
                <div class="uk-width-1-1">
                    <div class="uk-text-center">
                        <img src="' . asset('img/search.svg') . '" uk-img style="height: 250px;margin-top: -30px;" alt="">
                        <p class="grey-text-3 font-extrabold" style="font-size: 25px;">No Search found</p>
                        <p class="grey-text-1 font-regular" style="font-size: 17px;margin-top: -15px;">please retype in the search bar.</p>
                    </div>
                </div>';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );

            echo json_encode($data);
        }
    }
}
