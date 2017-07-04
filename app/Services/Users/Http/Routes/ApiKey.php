<?php

namespace App\Services\Users\Http\Routes;

use Illuminate\Routing\Router;
use JumpGate\Core\Contracts\Routes;
use JumpGate\Core\Http\Routes\BaseRoute;

class ApiKey extends BaseRoute implements Routes
{
    public $namespace = 'App\Services\Users\Http\Controllers';

    public $prefix = 'user/api-key';

    public $middleware = ['web', 'auth'];

    public function routes(Router $router)
    {
        $router->get('{id}')
            ->name('user.api-key.destroy')
            ->uses('ApiKey@destroy');

        $router->post('/')
            ->name('user.api-key.store')
            ->uses('ApiKey@store');

        $router->get('/')
            ->name('user.api-key.index')
            ->uses('ApiKey@index');
    }
}
