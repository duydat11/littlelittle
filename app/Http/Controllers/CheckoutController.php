<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Order;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function send_order(Request $request)
    {
        $data = array();
        $data['order_customer_name'] = $request->order_customer_name;
        $data['order_quantity'] = $request->order_quantity;
        $data['order_customer_email'] = $request->order_customer_email;
        $data['order_customer_phone'] = $request->order_customer_phone;
        $data['order_date_use'] = $request->order_date_use;
        $data['ticket_id'] = $request->ticket_id;

        DB::table('tbl_order')->insert($data);
        return redirect()->route('show_order');
    }

    public function show_order()
    {
        // $show_order_details = DB::table('tbl_order')->first();


        $show_order_details = Order::latest('order_id')->first();

        $ticketId = $show_order_details->ticket_id;
        $ticket = Ticket::find($ticketId);

        $ticketCount = Order::latest()->value('order_quantity'); // so luong ve ma moi vua dat = 5

        $ticket_full_name = $ticket->ticket_name;
        $totalAmount = $ticket->ticket_single_price * $show_order_details->order_quantity;

        return view('checkout')->with('show_order_details', $show_order_details)
        ->with('totalAmount', $totalAmount)->with('ticket_full_name', $ticket_full_name);


        // return view('checkout',['show_order_details' => $show_order_details, 'totalAmount' => $totalAmount]);
    }
}