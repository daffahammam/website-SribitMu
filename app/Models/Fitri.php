<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitri extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'nomor',
        'nomor',
        'totalUang',
        'totalBeras',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
