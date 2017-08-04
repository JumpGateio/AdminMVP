<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use JumpGate\Database\Searching\Contracts\Searchable;
use JumpGate\Database\Searching\Traits\CanSearch;
use JumpGate\Users\Models\User as BaseUser;

class User extends BaseUser implements Searchable
{
    use Notifiable;

    use CanSearch;

    public $searchProvider = \App\Providers\Search\User::class;

    public $searchParameters = [
        'email'     => 'string',
        'status_id' => 'integer',
        'roles'     => 'integer',
        'name'      => 'string',
    ];
}
