<?php

namespace App\Apis\GuildWars2\Models;

use App\Apis\GuildWars2\Models\Character\Backstory;
use App\Apis\GuildWars2\Models\Character\Bag;
use App\Apis\GuildWars2\Models\Character\Craft;
use App\Apis\GuildWars2\Models\Character\Equipment;
use App\Apis\GuildWars2\Models\Character\Skills;
use App\Apis\GuildWars2\Models\Character\Specializations;
use App\Apis\GuildWars2\Models\Character\Training;
use App\Apis\GuildWars2\Models\Character\WvWAbility;
use Carbon\Carbon;

/**
 * Class ApiKey
 *
 * @package App\Apis\GuildWars2\Models
 *
 * @property string            $name
 * @property string            $race
 * @property string            $gender
 * @property string            $profession
 * @property int               $level
 * @property string            $guild
 * @property int               $age
 * @property Carbon            $created
 * @property int               $deaths
 * @property Craft[]           $crafting
 * @property string            $title
 * @property Backstory[]       $backstory
 * @property WvWAbility[]      $wvw_abilities
 * @property Specializations[] $specializations
 * @property Skills[]          $skills
 * @property Equipment[]       $equipment
 * @property int[]             $recipes
 * @property Training[]        $training
 * @property Bag[]             $bags
 */
class Character extends BaseModel
{
    public function setCreatedAttribute($value)
    {
        $this->attributes['created'] = Carbon::parse($value);
    }

    public function setCraftingAttribute($value)
    {
        $this->attributes['crafting'] = supportCollector($value)
            ->transform(function ($resource) {
                return new Craft($resource);
            });
    }

    public function setBackstoryAttribute($value)
    {
        $this->attributes['backstory'] = supportCollector($value)
            ->transform(function ($resource) {
                return new Backstory(['id' => $resource]);
            });
    }

    public function setWvwAbilitiesAttribute($value)
    {
        $this->attributes['wvw_abilities'] = supportCollector($value)
            ->transform(function ($resource) {
                return new WvWAbility($resource);
            });
    }

    public function setSpecializationsAttribute($value)
    {
        $this->attributes['specializations'] = new Specializations($value);
    }

    public function setSkillsAttribute($value)
    {
        $this->attributes['skills'] = supportCollector($value)
            ->transform(function ($resource) {
                return new Skills($resource);
            });
    }

    public function setEquipmentAttribute($value)
    {
        $this->attributes['equipment'] = supportCollector($value)
            ->transform(function ($resource) {
                return new Equipment($resource);
            });
    }

    public function setTrainingAttribute($value)
    {
        $this->attributes['training'] = supportCollector($value)
            ->transform(function ($resource) {
                return new Training($resource);
            });
    }

    public function setBagsAttribute($value)
    {
        $this->attributes['bags'] = supportCollector($value)
            ->transform(function ($resource) {
                return new Bag($resource);
            });
    }
}
