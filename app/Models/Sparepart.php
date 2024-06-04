<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','kode_sparepart','jenis','brand','harga'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
