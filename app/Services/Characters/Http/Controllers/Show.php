<?php

namespace App\Services\Characters\Http\Controllers;

use App\Apis\GuildWars2\Character as CharacterApi;
use App\Http\Controllers\BaseController;
use App\Services\Characters\Models\Character;

class Show extends BaseController
{
    /**
     * @var \App\Services\Characters\Models\Character
     */
    private $characters;

    public function __construct(Character $characters)
    {
        $this->characters = $characters;
    }

    public function __invoke($id)
    {
        $character = $this->characters->find($id);
        $details = (new CharacterApi)->find($character->name);

        $this->setViewData(compact('character', 'details'));

        return $this->view();
    }

}
