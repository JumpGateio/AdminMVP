<?php

namespace App\Services\Users\Http\Controllers;

use App\Apis\GuildWars2\Character;
use App\Apis\GuildWars2\Key;
use App\Http\Controllers\BaseController;
use App\Models\User\ApiKey as ApiKeyModel;

class ApiKey extends BaseController
{
    /**
     * @var \App\Apis\GuildWars2\Key
     */
    private $api;

    /**
     * @var \App\Models\User\ApiKey
     */
    private $apiKeys;

    public function __construct(Key $api, ApiKeyModel $apiKeys)
    {
        $this->api     = $api;
        $this->apiKeys = $apiKeys;
    }

    public function index()
    {
        $key = auth()->user()->apiKey;

        dd((new Character)->all()->get(2));

        $this->setViewData(compact('key'));

        return $this->view();
    }

    public function store()
    {
        $apiKey = request('api_key');
        $token  = $this->api->getToken($apiKey);

        $find = [
            'user_id' => auth()->id(),
            'api_key' => $apiKey,
        ];

        $attributes = $token->permissions
            ->flatMap(function ($permission) {
                return [$permission => 1];
            })
            ->toArray();

        $this->apiKeys->updateOrCreate($find, $attributes);

        return redirect(route('user.api-key.index'))
            ->with('message', 'API Key saved!');
    }

    public function destroy($id)
    {
        $this->apiKeys->find($id)->delete();

        return redirect(route('user.api-key.index'))
            ->with('message', 'API Key removed!');
    }
}
