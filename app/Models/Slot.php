<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'spent_amount',
        'won_amount',
        'spin_count'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
