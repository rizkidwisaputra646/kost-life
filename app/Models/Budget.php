<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    // Biar kolom-kolom ini bisa diisi otomatis lewat Controller
    protected $fillable = [
        'user_id', 
        'amount', 
        'month_year', 
        'start_date', 
        'end_date'
    ];

    // Hubungkan balik ke User (Satu Budget milik satu User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}