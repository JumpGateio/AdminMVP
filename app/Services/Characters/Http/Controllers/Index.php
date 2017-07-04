<?php

namespace App\Services\Characters\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Services\Characters\Models\Character;

class Index extends BaseController
{
    /**
     * @var \App\Services\Characters\Models\Character
     */
    private $characters;

    public function __construct(Character $characters)
    {
        $this->characters = $characters;
    }

    public function __invoke()
    {
        $characters = auth()->user()->characters;

        $this->setViewData(compact('characters'));

        return $this->view();
    }

}
