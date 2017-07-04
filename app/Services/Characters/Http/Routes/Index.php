<?php

namespace App\Services\Characters\Http\Routes;

use Illuminate\Routing\Router;
use JumpGate\Core\Contracts\Routes;
use JumpGate\Core\Http\Routes\BaseRoute;

class Index extends BaseRoute implements Routes
{
    public $namespace = 'App\Services\Characters\Http\Controllers';

    public $prefix = 'user/characters';

    public $middleware = ['web', 'auth'];

    public function routes(Router $router)
    {
        $router->get('/')
            ->name('user.character.index')
            ->uses('Index');
    }
}
