<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function send_contact(Request $request)
    {
        $data = array();
        $data['contact_email'] = $request->contact_email;
        $data['contact_address'] = $request->contact_address;
        $data['contact_name'] = $request->contact_name;
        $data['contact_phone'] = $request->contact_phone;
        $data['contact_msg'] = $request->contact_msg;

        DB::table('tbl_contact')->insert($data);
        return Redirect::to('/contact');
    }
}