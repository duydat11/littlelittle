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
}