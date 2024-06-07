<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'agent_id',
        'expiry_date',
        'price',
        'discount',
        'actual_price',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
