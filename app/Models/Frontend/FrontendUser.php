<?php

namespace App\Models\Frontend;

use App\Notifications\Frontend\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class FrontendUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'frontend_users';

    protected $fillable = ['customer_id', 'name', 'email', 'password', 'is_active', 'phone', 'birth_date', 'address', 'biography'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['password' => 'hashed', 'is_active' => 'boolean'];

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
