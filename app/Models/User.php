<?php

namespace App\Models;

use App\Models\User\ApiKey;
use App\Services\Characters\Models\Character;
use Illuminate\Notifications\Notifiable;
use JumpGate\Users\Models\User as BaseUser;

class User extends BaseUser
{
    use Notifiable;

    public function apiKey()
    {
        return $this->hasOne(ApiKey::class, 'user_id');
    }

    public function characters()
    {
        return $this->hasMany(Character::class, 'user_id');
    }
}
