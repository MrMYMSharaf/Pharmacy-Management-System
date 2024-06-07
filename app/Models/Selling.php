<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selling extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'drug_id',
        'price',
        'quantity',
        'selling_date',
        'total_price'
    ];
}
