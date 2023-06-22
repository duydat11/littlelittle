<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loaive;
use App\Models\Datve;
use App\Models\Thanhtoan;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use PDF;
use Mail;

class CheckoutController extends Controller
{
    public function send_order(Request $request)
    {
        $data = array();
        $data['order_customer_name'] = $request->order_customer_name;
        $data['order_quantity'] = $request->order_quantity;
        $data['order_customer_address'] = $request->order_customer_email;
        $data['order_customer_phone'] = $request->order_customer_phone;
        $data['order_date_use'] = $request->order_date_use;
        $data['ticket_id'] = $request->ticket_id;

        DB::table('tbl_datve')->insert($data);
        return redirect()->route('show_order');
    }

    public function show_order()
    {
        // $show_order_details = DB::table('tbl_order')->first();


        $show_order_details = Datve::latest('order_id')->first();

        $ticketId = $show_order_details->ticket_id;
        $ticket = Loaive::find($ticketId);

        $ticketCount = Datve::latest()->value('order_quantity'); // so luong ve ma moi vua dat = 5

        $ticket_full_name = $ticket->ticket_name;
        $totalAmount = $ticket->ticket_single_price * $show_order_details->order_quantity;

        return view('ThanhTon')->with('show_order_details', $show_order_details)
        ->with('totalAmount', $totalAmount)->with('ticket_full_name', $ticket_full_name);


        // return view('checkout',['show_order_details' => $show_order_details, 'totalAmount' => $totalAmount]);
        
    }
    public function checkout_success(Request $request)
    {
        $data = array();
        $data['payment_account_number'] = $request->payment_account_number;
        $data['payment_account_name'] = $request->payment_account_name;


                // Retrieve the input date value
        $inputDate = $request->payment_expired_date;

        // Split the input date value into year and month components
        $year = explode('-', $inputDate)[0];
        $month = explode('-', $inputDate)[1];

        // Construct the date string in the correct format (YYYY-MM-DD)
        $date = $year . '-'. $month . '-01';

        $data['payment_expired_date'] = $date;



        $data['payment_cvc'] = Crypt::encryptString($request->payment_cvc);

        
        $checkout_code = substr(md5(microtime()),rand(0,26),5);

        $data['payment_code'] = $checkout_code;


        $show_order_details = Datve::latest('order_id')->first();
        $ticketId = $show_order_details->ticket_id;
        $ticket = Loaive::find($ticketId);

        $ticketCount = Datve::latest()->value('order_quantity'); // so luong ve moi vua dat
        
        $ticket_full_name = $ticket->ticket_name;
        $totalAmount = $ticket->ticket_single_price * $show_order_details->order_quantity;

        $data['payment_total'] = $totalAmount;

        DB::table('tbl_thanhtoan')->insert($data);
        return redirect()->route('checkout_page');
    }



    public function checkout_page()
    {
        $order = Datve::latest('order_id')->first();
        
        $show_payment = Thanhtoan::latest('payment_id')->first();

        $ticketCount = Datve::latest()->value('order_quantity');

        $date_use = $order->order_date_use;

        $qrcode_url = route('qr_details');
        return view('payment_success')->with('show_payment', $show_payment)
        ->with('qrcode_url', $qrcode_url)->with('ticketCount', $ticketCount)->with('date_use', $date_use);
    }

    public function qr_details()
    {
        $show_payment_QR = Thanhtoan::latest('payment_id')->first();

        $show_order_details = Datve::latest('order_id')->first();
        $ticketId = $show_order_details->ticket_id;
        $ticket = Loaive::find($ticketId);

        $ticketCount = Datve::latest()->value('order_quantity'); // so luong ve moi vua dat
        
        $ticket_full_name = $ticket->ticket_name;
        $totalAmount = $ticket->ticket_single_price * $show_order_details->order_quantity;


        return view('qr_details')->with('show_payment_QR', $show_payment_QR)->with('totalAmount', $totalAmount);
    }


    public function print_ticket($order_code){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_ticket_convert($order_code));
        return $pdf->stream();
    }



    public function print_ticket_convert($order_code)
{
    $print_ticket = Datve::latest('order_id')->first();
    $payment = Thanhtoan::latest('payment_id')->first();
    $ticketId = $print_ticket->ticket_id;
    $ticket = Loaive::find($ticketId);

    $ticket_name = $ticket->ticket_name;

    $output = '';

    $output .= '<!DOCTYPE html>';
    $output .= '<html lang="en">';
    $output .= '<head>';
    $output .= '<meta charset="UTF-8">';
    $output .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    $output .= '<title>Chi tiết vé</title>';
    $output .= '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
    $output .= '<style>';
    $output .= 'body { font-family: DejaVu Sans; }';
    $output .= '</style>';
    $output .= '</head>';
    $output .= '<body>';
    $output .= '<div class="container">';
    $output .= '<h1>Thông tin vé</h1>';
    $output .= '<table class="table">';
    $output .= '<tbody>';
    $output .= '<tr><td>Mã vé</td><td>' . $payment->payment_code . '</td></tr>';
    $output .= '<tr><td>Loại vé</td><td>' . $ticket_name . '</td></tr>';
    $output .= '<tr><td>Họ tên</td><td>' . $print_ticket->order_customer_name . '</td></tr>';
    $output .= '<tr><td>Email</td><td>' . $print_ticket->order_customer_email . '</td></tr>';
    $output .= '<tr><td>Số điện thoại</td><td>' . $print_ticket->order_customer_phone . '</td></tr>';
    $output .= '<tr><td>Số lượng vé</td><td>' . $print_ticket->order_quantity . '</td></tr>';
    $output .= '<tr><td>Ngày sử dụng</td><td>' . $print_ticket->order_date_use . '</td></tr>';
    $output .= '<tr><td>Tổng tiền</td><td>' . number_format($payment->payment_total, 0, ',', '.') . ' VNĐ</td></tr>';
    $output .= '</tbody>';
    $output .= '</table>';
    $output .= '</div>';
    $output .= '<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>';
    $output .= '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>';
    $output .= '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>';
    $output .= '</body>';
    $output .= '</html>';

    return $output;
}

public function send_mail_customer(Request $request){
        $show_order_details = Datve::latest('order_id')->first();
        $show_payment_details = Thanhtoan::latest('payment_id')->first();
        $ticketId = $show_order_details->ticket_id;
        $ticket = Loaive::find($ticketId);

        $ticketCount = Datve::latest()->value('order_quantity'); 
        $totalAmount = $ticket->ticket_single_price * $show_order_details->order_quantity;
    
        $title_mail = "Đơn hàng của bạn";
        $data['order_customer_email'][] = $show_order_details->order_customer_email;

        $mail_array = array(
        'payment_code' => $show_payment_details->payment_code,
        'ticket_name' => $ticket->ticket_name,
        'order_customer_name' => $show_order_details->order_customer_name,
        'order_customer_phone' => $show_order_details->order_customer_phone,
        'order_customer_email' => $show_order_details->order_customer_email,
        'order_date_use' => $show_order_details->order_date_use,
        'order_quantity' => $show_payment_details->order_quantity,
        'totalAmount' => $totalAmount,
    );

    Mail::send('send_mail', ['mail_array'=>$mail_array, 'totalAmount' =>$totalAmount],
    function ($message) use ($title_mail, $data) {
        $message->to($data['order_customer_email'])->subject($title_mail); //send this mail with subj
        $message->from($data['order_customer_email'],$title_mail); //send from this email
    });
    return Redirect::to('/home');
}
}