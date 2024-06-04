<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','nama','email','notelp','password','alamat'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
