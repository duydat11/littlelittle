<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class EventController extends Controller
{
    public function index(Request $request)
    {
        $all_event = DB::table('event')->where('status','1')->orderby('event_id','DESC')->paginate(4); 
        return view('SuKien')->with('all_event',$all_event); 
    }

    public function details_event($event_slug)
    {
        $details_event = DB::table('event')->where('event.event_slug', $event_slug)->get();
        return view('CTSukien')->with('details_event', $details_event);
    }
}