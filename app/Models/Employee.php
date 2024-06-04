<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','nama','email','notelp','alamat', 'tanggal_lahir'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
