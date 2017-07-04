<?php

namespace App\Services\Characters\Http\Routes;

use Illuminate\Routing\Router;
use JumpGate\Core\Contracts\Routes;
use JumpGate\Core\Http\Routes\BaseRoute;

class Show extends BaseRoute implements Routes
{
    public $namespace = 'App\Services\Characters\Http\Controllers';

    public $prefix = 'user/characters';

    public $middleware = ['web', 'auth'];

    public function routes(Router $router)
    {
        $router->get('{id}')
            ->name('user.character.show')
            ->uses('Show');
    }
}
