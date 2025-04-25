<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'nomor',
    ];

    protected $status = [
        'status' => 'Belum disetujui'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
