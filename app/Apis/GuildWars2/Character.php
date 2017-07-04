<?php

namespace App\Apis\GuildWars2;

use App\Apis\GuildWars2\Models\Character as CharacterModel;

class Character extends Api
{
    public function all()
    {
        $this->requiresAuth();
        $allowed = $this->requiresAccess('characters');

        if (! $allowed) {
            return false;
        }

        return supportCollector($this->api->characters($this->apiKey->api_key)->all())
            ->transform(function ($character) {
                return new CharacterModel($character);
            });
    }

    public function find($name)
    {
        $this->requiresAuth();
        $allowed = $this->requiresAccess('characters');

        if (! $allowed) {
            return false;
        }

        return new CharacterModel(
            $this->api->characters($this->apiKey->api_key)->get($name)
        );
    }
}
