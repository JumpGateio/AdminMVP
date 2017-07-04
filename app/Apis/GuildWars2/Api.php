<?php

namespace App\Apis\GuildWars2;

use App\Models\User;
use GW2Treasures\GW2Api\GW2Api;
use Symfony\Component\Routing\Exception\MissingMandatoryParametersException;

class Api
{
    /**
     * @var \GW2Treasures\GW2Api\GW2Api
     */
    protected $api;

    /**
     * @var null|\App\Apis\GuildWars2\User
     */
    protected $user;

    /**
     * @var null|\App\Models\User\ApiKey
     */
    protected $apiKey;

    /**
     * @param \App\Models\User $user
     */
    public function __construct(User $user = null)
    {
        if (is_null($user) && auth()->check()) {
            $user = auth()->user();
        }

        $this->api    = new GW2Api;
        $this->user   = $user;
        $this->apiKey = is_null($user) ? null : $user->apiKey;
    }

    public function setUser(User $user)
    {
        $this->user   = $user;
        $this->apiKey = $user->apiKey;

        return $this;
    }

    protected function requiresAuth()
    {
        if (is_null($this->apiKey)) {
            throw new MissingMandatoryParametersException('You must provide a valid api key for this call.');
        }
    }

    protected function requiresAccess($key)
    {
        if ($this->apiKey->{$key} === 0) {
            return false;
        }

        return true;
    }
}
