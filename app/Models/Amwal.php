<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amwal extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'nomor',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
