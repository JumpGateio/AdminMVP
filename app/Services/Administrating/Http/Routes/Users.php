<?php

namespace App\Services\Administrating\Http\Routes;

use JumpGate\Core\Contracts\Routes;
use JumpGate\Core\Http\Routes\BaseRoute;
use Illuminate\Routing\Router;

class Users extends BaseRoute implements Routes
{
    public $namespace = 'App\Services\Administrating\Http\Controllers';

    public $prefix = 'admin/user';

    public $middleware = ['web', 'acl', 'auth'];

    public $role = 'admin';

    public function routes(Router $router)
    {
        $router->get('{id}')
               ->name('admin.user.show')
               ->uses('Users@show')
               ->middleware('active:admin_user');

        $router->any('/')
               ->name('admin.user.index')
               ->uses('Users@index')
               ->middleware('active:admin_user');
    }
}
