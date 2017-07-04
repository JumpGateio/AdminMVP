<?php

namespace App\Models\User;

use App\Models\BaseModel;
use App\Models\User;

class ApiKey extends BaseModel
{
    protected $table = 'user_api_keys';

    protected $fillable = [
        'user_id',
        'api_key',
        'tradingpost',
        'characters',
        'pvp',
        'progression',
        'wallet',
        'guilds',
        'builds',
        'account',
        'inventories',
        'unlocks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
