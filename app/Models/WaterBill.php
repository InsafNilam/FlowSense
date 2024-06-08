<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_no',
        'bill_date',
        'due_date',
        'bill_amount',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }


}
