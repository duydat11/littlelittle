<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datve extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'order_customer_name', 'order_customer_phone', 'order_customer_address', 'order_quantity','order_date_use','ticket_id'
    ];
    protected $primaryKey = 'order_id';
    protected $table = 'tbl_datve';
}