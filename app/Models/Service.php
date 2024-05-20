<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','kode_service','tanggal_service','kode_sparepart','nama_customer', 'nama_employee'
    ];
}
