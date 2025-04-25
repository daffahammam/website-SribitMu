<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'nomor',
        
    ];

    protected $user_id = [
        'user_id' => '1'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
