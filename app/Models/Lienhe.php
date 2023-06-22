<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lienhe extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
    'contact_name', 'contact_phone', 'contact_address','contact_mail', 'contact_msg',
    ];
    protected $primaryKey = 'contact_id';
    protected $table = 'tbl_lienhe';
}