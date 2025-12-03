<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Driver extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'country_code',
        'password',
        'profile_photo',
        'rating',
        'total_rides',
        'completed_rides',
        'cancelled_rides',
        'total_earnings',
        'status',
        'verification_status',
        'referral_code',
        'referred_by',
        'is_online',
        'current_latitude',
        'current_longitude',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_online' => 'boolean',
        'rating' => 'decimal:2',
        'total_earnings' => 'decimal:2',
        'current_latitude' => 'decimal:8',
        'current_longitude' => 'decimal:8',
    ];

    // Relationships
    public function documents()
    {
        return $this->hasMany(DriverDocument::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function rides()
    {
        return $this->hasMany(Ride::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function referrer()
    {
        return $this->belongsTo(Driver::class, 'referred_by');
    }

    public function referrals()
    {
        return $this->hasMany(Driver::class, 'referred_by');
    }
}
