<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thanhtoan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
    'payment_account_name', 'payment_account_number', 'payment_expired_date','payment_cvv', 'payment_total','payment_code'
    ];
    protected $primaryKey = 'payment_id';
    protected $table = 'tbl_thanhtoan';
}