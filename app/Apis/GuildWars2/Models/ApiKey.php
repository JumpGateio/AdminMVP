<?php

namespace App\Apis\GuildWars2\Models;

use JumpGate\Database\Collections\SupportCollection;

/**
 * Class ApiKey
 *
 * @package App\Apis\GuildWars2\Models
 *
 * @property string            $id
 * @property string            $name
 * @property SupportCollection $permissions
 */
class ApiKey extends BaseModel
{
    public function setPermissionsAttribute($value)
    {
        return $this->attributes['permissions'] = supportCollector($value);
    }
}
