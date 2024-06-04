<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','kode_service','tanggal_service','kode_sparepart','nama_customer', 'nama_employee', 'email_customer', 'email_employee', 'customer_id', 'employee_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class);
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }
}
