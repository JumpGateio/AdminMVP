<?php

namespace App\Apis\GuildWars2\Models\Character;

use App\Apis\GuildWars2\Models\BaseModel;

/**
 * Class Skills
 *
 * @package App\Apis\GuildWars2\Models
 *
 * @property Specialization[] $pve
 * @property Specialization[] $pvp
 * @property Specialization[] $wvw
 */
class Specializations extends BaseModel
{
    public function setPveAttribute($value)
    {
        $this->attributes['pve'] = supportCollector($value)
            ->transform(function ($resource) {
                return new Specialization($resource);
            });
    }

    public function setPvpAttribute($value)
    {
        $this->attributes['pvp'] = supportCollector($value)
            ->transform(function ($resource) {
                return new Specialization($resource);
            });
    }

    public function setWvwAttribute($value)
    {
        $this->attributes['wvw'] = supportCollector($value)
            ->transform(function ($resource) {
                return new Specialization($resource);
            });
    }
}
