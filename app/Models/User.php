<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function activities()
{
    return $this->hasMany(Activity::class);
}
public function amwals()
{
    return $this->hasMany(Amwal::class);
}
public function announcements()
{
    return $this->hasMany(Announcement::class);
}
public function articles()
{
    return $this->hasMany(Article::class);
}
public function cars()
{
    return $this->hasMany(Car::class);
}
public function committees()
{
    return $this->hasMany(Committee::class);
}
public function finances()
{
    return $this->hasMany(Finance::class);
}
public function fitris()
{
    return $this->hasMany(Fitri::class);
}
public function galleries()
{
    return $this->hasMany(Gallery::class);
}
public function organizations()
{
    return $this->hasMany(Organization::class);
}
public function qurbans()
{
    return $this->hasMany(Qurban::class);
}
public function zakats()
{
    return $this->hasMany(Zakat::class);
}

}
