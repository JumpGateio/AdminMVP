<?php

namespace App\Apis\GuildWars2\Models;

use Jenssegers\Model\Model;

class BaseModel extends Model
{
    public function __construct($attributes = [])
    {
        if (! is_array($attributes)) {
            $attributes = (array)$attributes;
        }

        parent::__construct($attributes);
    }
}
