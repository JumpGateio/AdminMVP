<?php

namespace App\Listeners\Auth\UserLoggedIn;

use App\Apis\GuildWars2\Character;
use App\Apis\GuildWars2\Models\Character as ApiCharacterModel;
use App\Services\Characters\Models\Character as CharacterModel;
use JumpGate\Users\Events\UserLoggedIn;

class UpdateCharacters
{
    /**
     * @var \App\Apis\GuildWars2\Character
     */
    private $characters;

    public function __construct(Character $characters)
    {
        $this->characters = $characters;
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedIn $event
     *
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        $this->characters
            ->setUser($event->user)
            ->all()
            ->each(function (ApiCharacterModel $character) {
                $find = [
                    'user_id' => auth()->id(),
                    'name'    => $character->name,
                ];

                $attributes = [
                    'profession' => $character->profession,
                    'race'       => $character->race,
                    'gender'     => $character->gender,
                    'level'      => $character->level,
                    'deaths'     => $character->deaths,
                    'age'        => $character->age,
                    'created_at' => $character->created,
                ];

                return CharacterModel::updateOrCreate($find, $attributes);
            });
    }
}
