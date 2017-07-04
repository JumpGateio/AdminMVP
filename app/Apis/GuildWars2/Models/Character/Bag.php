<?php

namespace App\Apis\GuildWars2\Models\Character;

use App\Apis\GuildWars2\Models\BaseModel;

/**
 * Class Bag
 *
 * @package App\Apis\GuildWars2\Models
 *
 * @property int       $id
 * @property int       $size
 * @property Inventory $inventory
 */
class Bag extends BaseModel
{
    public function setInventoryAttribute($value)
    {
        $this->attributes['inventory'] = supportCollector($value)
            ->transform(function ($resource) {
                return new BagItem($resource);
            });
    }
}
