<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class TicketController extends Controller
{
    public function show_ticket(Request $request)
    {
        $detail_ticket = DB::table('tbl_ticket')->where('ticket_status', 1)->get();
        return view('home')->with('detail_ticket', $detail_ticket);
    }

}