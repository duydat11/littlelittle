<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'event_name', 'event_slug', 'event_desc', 'event_content','event_img', 'ticket_price', 'date_start', 'date_end', 'status',
    ];
    protected $primaryKey = 'event_id';
    protected $table = 'event';
}