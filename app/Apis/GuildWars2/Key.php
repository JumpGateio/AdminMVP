<?php

namespace App\Apis\GuildWars2;

use App\Apis\GuildWars2\Models\ApiKey;
use GW2Treasures\GW2Api\GW2Api;

class Key extends Api
{
    /**
     * @param string $apiKey
     *
     * @return \App\Apis\GuildWars2\Models\ApiKey
     */
    public function getToken($apiKey)
    {
        return new ApiKey($this->api->tokeninfo($apiKey)->get());
    }
}
