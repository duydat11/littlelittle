<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaive extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'ticket_name', 'ticket_desc', 'ticket_single_price', 'ticket_remain','ticket_status',
    ];
    protected $primaryKey = 'ticket_id';
    protected $table = 'tbl_loaive';
}